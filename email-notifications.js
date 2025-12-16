// ============================================
// 📧 EMAIL NOTIFICATION SYSTEM - FET PROJECT
// ============================================
// Sistem ini mengirim email OTOMATIS ke setiap user
// yang enable email notification di settings
// ============================================

// ====================================
// STEP 1: KONFIGURASI EMAILJS
// ====================================
// TODO: Ganti dengan key kamu dari EmailJS Dashboard!
const EMAILJS_CONFIG = {
    SERVICE_ID: 'service_abc123',     // ← Ganti dengan Service ID kamu
    TEMPLATE_ID: 'template_gtgdla9',   // ← Ganti dengan Template ID kamu
    PUBLIC_KEY: 'F6gqqFv2Zda4jl_ta'     // ← Ganti dengan Public Key kamu
};

// ====================================
// STEP 2: FUNCTION CEK & KIRIM EMAIL OTOMATIS
// ====================================
// Function ini jalan OTOMATIS setiap hari!
function checkAndSendDailyEmail() {
    console.log('🔍 Checking if need to send daily email...');
    
    // 1. Ambil settings user (apakah enable email?)
    const settings = JSON.parse(localStorage.getItem('fetNotificationSettings') || '{}');
    
    // CEK: Apakah user enable email notification?
    if (!settings.emailNotifications) {
        console.log('❌ Email notifications DISABLED by user');
        return; // STOP! User belum enable
    }
    console.log('✅ Email notifications ENABLED');
    
    // 2. CEK: Apakah sudah kirim hari ini?
    const lastSent = localStorage.getItem('lastEmailSent');
    const today = new Date().toDateString(); // "Mon Dec 16 2025"
    
    if (lastSent === today) {
        console.log('⏭️ Email ALREADY SENT today:', today);
        return; // STOP! Sudah kirim hari ini
    }
    console.log('📅 Last sent:', lastSent || 'Never', '| Today:', today);
    
    // 3. Ambil data food items user ini
    const foodItems = JSON.parse(localStorage.getItem('fetFoodItems') || '[]');
    console.log('🍎 Total food items:', foodItems.length);
    
    // 4. Filter: Cari food yang expiring dalam 7 hari
    const expiringItems = foodItems.filter(item => {
        const daysLeft = calculateDaysRemaining(item.expiryDate);
        return daysLeft >= 0 && daysLeft <= 7; // 0-7 hari lagi expire
    });
    
    console.log('⚠️ Expiring items (0-7 days):', expiringItems.length);
    
    // CEK: Ada food yang expiring?
    if (expiringItems.length === 0) {
        console.log('✅ No expiring items. No email needed.');
        return; // STOP! Gak ada yang expire
    }
    
    // 5. KIRIM EMAIL! 🚀
    console.log('📧 SENDING EMAIL to user...');
    sendExpiryEmail(expiringItems);
}

// ====================================
// STEP 3: FUNCTION KIRIM EMAIL (EmailJS)
// ====================================
function sendExpiryEmail(items) {
    console.log('📤 Preparing email with', items.length, 'items...');
    
    // 1. Ambil data user yang LOGIN
    const user = JSON.parse(localStorage.getItem('fetUser') || '{}');
    console.log('👤 User:', user.name, '| Email:', user.email);
    
    // 2. Format daftar food yang expiring
    let itemsList = '';
    items.forEach(item => {
        const daysLeft = calculateDaysRemaining(item.expiryDate);
        
        // Tentukan status
        let status = '';
        if (daysLeft === 0) {
            status = '🔴 EXPIRES TODAY!';
        } else if (daysLeft === 1) {
            status = '🟡 1 day left';
        } else {
            status = `🟢 ${daysLeft} days left`;
        }
        
        // Tambahkan ke list
        itemsList += `
• ${item.name} (${item.category})
  Status: ${status}
  Expiry: ${formatDate(item.expiryDate)}
`;
    });
    
    // 3. Siapkan data untuk email template
    const templateParams = {
        user_name: user.name || 'User',
        to_email: user.email || 'demo@fet.com',  // ← EMAIL USER INI!
        item_count: items.length,
        items_list: itemsList
    };
    
    console.log('📧 Sending to email:', templateParams.to_email);
    
    // 4. KIRIM via EmailJS! 🚀
    emailjs.send(
        EMAILJS_CONFIG.SERVICE_ID,
        EMAILJS_CONFIG.TEMPLATE_ID,
        templateParams
    )
    .then(function(response) {
        // SUCCESS! ✅
        console.log('✅ EMAIL SENT SUCCESSFULLY!');
        console.log('Response:', response.status, response.text);
        
        // Simpan waktu kirim (biar gak kirim lagi hari ini)
        localStorage.setItem('lastEmailSent', new Date().toDateString());
        
        // Tampilkan notifikasi sukses
        if (typeof showToast === 'function') {
            showToast(
                '📧 Email Sent!', 
                'Daily summary sent to your email', 
                'success'
            );
        }
    })
    .catch(function(error) {
        // FAILED! ❌
        console.error('❌ EMAIL FAILED!');
        console.error('Error:', error);
        
        // Tampilkan notifikasi error
        if (typeof showToast === 'function') {
            showToast(
                '❌ Email Failed', 
                'Could not send email notification', 
                'danger'
            );
        }
    });
}

// ====================================
// STEP 4: FUNCTION TEST EMAIL MANUAL
// ====================================
// Dipanggil saat user click button "Send Test"
function sendTestEmail() {
    console.log('🧪 TEST EMAIL button clicked!');
    
    // 1. CEK: Apakah email notification enabled?
    const settings = JSON.parse(localStorage.getItem('fetNotificationSettings') || '{}');
    
    if (!settings.emailNotifications) {
        console.log('❌ Email notifications disabled');
        if (typeof showToast === 'function') {
            showToast(
                '⚠️ Email Disabled', 
                'Enable email notifications in settings first', 
                'warning'
            );
        }
        return;
    }
    
    // 2. Ambil food items
    const foodItems = JSON.parse(localStorage.getItem('fetFoodItems') || '[]');
    const expiringItems = foodItems.filter(item => {
        const daysLeft = calculateDaysRemaining(item.expiryDate);
        return daysLeft >= 0 && daysLeft <= 7;
    });
    
    // 3. CEK: Ada food yang expiring?
    if (expiringItems.length === 0) {
        console.log('❌ No expiring items');
        if (typeof showToast === 'function') {
            showToast(
                'ℹ️ No Items', 
                'No expiring items to notify about. Add some food first!', 
                'info'
            );
        }
        return;
    }
    
    // 4. KIRIM TEST EMAIL! 🚀
    console.log('📧 Sending TEST email...');
    sendExpiryEmail(expiringItems);
}

// ====================================
// STEP 5: SCHEDULE OTOMATIS (PENTING!)
// ====================================
// Function ini yang bikin email kirim OTOMATIS!
function scheduleDailyEmail() {
    console.log('⏰ Email scheduler started!');
    
    // 1. Check IMMEDIATELY saat page load (untuk testing)
    setTimeout(function() {
        console.log('🔍 Initial check after 3 seconds...');
        checkAndSendDailyEmail();
    }, 3000); // 3 detik setelah load
    
    // 2. Check SETIAP JAM (untuk catch jam 8 pagi)
    setInterval(function() {
        const now = new Date();
        const hour = now.getHours(); // 0-23
        const minute = now.getMinutes();
        
        console.log(`⏰ Hourly check: ${hour}:${minute}`);
        
        // Kirim email jam 8 pagi
        if (hour === 8 && minute < 5) {
            console.log('🌅 IT\'S 8 AM! Checking for daily email...');
            checkAndSendDailyEmail();
        }
    }, 60 * 60 * 1000); // Setiap 1 jam (3600000 ms)
    
    console.log('✅ Scheduler active: Will check at 8 AM daily');
}

// ====================================
// HELPER FUNCTIONS
// ====================================

// Hitung sisa hari sampai expire
function calculateDaysRemaining(expiryDate) {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    const expiry = new Date(expiryDate);
    expiry.setHours(0, 0, 0, 0);
    
    const diffTime = expiry - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    return diffDays;
}

// Format tanggal
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}

// ====================================
// STEP 6: INITIALIZE SAAT PAGE LOAD
// ====================================
// Ini yang bikin sistem jalan otomatis!
document.addEventListener('DOMContentLoaded', function() {
    console.log('📧 Email Notification System Loading...');
    
    // Check apakah user sudah login
    const user = JSON.parse(localStorage.getItem('fetUser') || '{}');
    
    if (user.email) {
        console.log('✅ User logged in:', user.name, '(' + user.email + ')');
        
        // START SCHEDULER! 🚀
        scheduleDailyEmail();
        
        console.log('✅ Email notification system ACTIVE!');
    } else {
        console.log('❌ No user logged in. Email system inactive.');
    }
});

// ====================================
// LOG SYSTEM INFO
// ====================================
console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
console.log('📧 EMAIL NOTIFICATION SYSTEM v1.0');
console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
console.log('Features:');
console.log('  ✅ Auto send at 8 AM daily');
console.log('  ✅ Test email button');
console.log('  ✅ Per-user email (localStorage)');
console.log('  ✅ Expiring items (0-7 days)');
console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');