// ==========================================
// FET - Food Expiry Tracker
// Settings JavaScript
// ==========================================

// === INITIALIZATION ===
document.addEventListener('DOMContentLoaded', function() {
    loadSettings();
    calculateStorage();
    checkNotificationPermission();
});

// === LOAD SETTINGS ===
function loadSettings() {
    // Load user profile
    const user = JSON.parse(localStorage.getItem('fetUser') || '{}');
    if (user.name) {
        document.getElementById('settingsFullName').value = user.name;
        document.getElementById('profileName').textContent = user.name;
    }
    if (user.email) {
        document.getElementById('settingsEmail').value = user.email;
        document.getElementById('profileEmail').textContent = user.email;
    }
    if (user.phone) {
        document.getElementById('settingsPhone').value = user.phone;
    }
    if (user.location) {
        document.getElementById('settingsLocation').value = user.location;
    }
    
    // Load notification settings
    const notifSettings = JSON.parse(localStorage.getItem('fetNotificationSettings') || '{}');
    
    if (notifSettings.expiryNotifications !== undefined) {
        document.getElementById('expiryNotifications').checked = notifSettings.expiryNotifications;
    }
    if (notifSettings.browserNotifications !== undefined) {
        document.getElementById('browserNotifications').checked = notifSettings.browserNotifications;
    }
    if (notifSettings.emailNotifications !== undefined) {
        document.getElementById('emailNotifications').checked = notifSettings.emailNotifications;
    }
    if (notifSettings.recipeSuggestions !== undefined) {
        document.getElementById('recipeSuggestions').checked = notifSettings.recipeSuggestions;
    }
    if (notifSettings.notificationTiming) {
        document.getElementById('notificationTiming').value = notifSettings.notificationTiming;
    }
    
    // Load theme
    const theme = localStorage.getItem('fetTheme') || 'light';
    applyTheme(theme);
}

// === PROFILE MANAGEMENT ===
function saveProfile() {
    const name = document.getElementById('settingsFullName').value;
    const email = document.getElementById('settingsEmail').value;
    const phone = document.getElementById('settingsPhone').value;
    const location = document.getElementById('settingsLocation').value;
    
    // Validate
    if (!name || !email) {
        showToast('Error', 'Name and email are required!', 'danger');
        return;
    }
    
    if (!validateEmail(email)) {
        showToast('Error', 'Please enter a valid email address!', 'danger');
        return;
    }
    
    // Save to localStorage
    const user = JSON.parse(localStorage.getItem('fetUser') || '{}');
    user.name = name;
    user.email = email;
    user.phone = phone;
    user.location = location;
    
    localStorage.setItem('fetUser', JSON.stringify(user));
    
    // Update display
    document.getElementById('profileName').textContent = name;
    document.getElementById('profileEmail').textContent = email;
    document.getElementById('userName').textContent = name;
    document.getElementById('userEmail').textContent = email;
    
    showToast('Success!', 'Profile updated successfully!', 'success');
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function openEditProfileModal() {
    // Focus on name input
    document.getElementById('settingsFullName').focus();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// === NOTIFICATION SETTINGS ===
function saveNotificationSettings() {
    const settings = {
        expiryNotifications: document.getElementById('expiryNotifications').checked,
        browserNotifications: document.getElementById('browserNotifications').checked,
        emailNotifications: document.getElementById('emailNotifications').checked,
        recipeSuggestions: document.getElementById('recipeSuggestions').checked,
        soundEnabled: document.getElementById('soundEnabled').checked,
        notificationTiming: document.getElementById('notificationTiming').value
    };
    
    localStorage.setItem('fetNotificationSettings', JSON.stringify(settings));
    showToast('Saved!', 'Notification preferences updated!', 'success');
}

function toggleBrowserNotifications() {
    const enabled = document.getElementById('browserNotifications').checked;
    
    if (enabled) {
        requestNotificationPermission();
    } else {
        saveNotificationSettings();
    }
}

function checkNotificationPermission() {
    if ('Notification' in window) {
        const permission = Notification.permission;
        const checkbox = document.getElementById('browserNotifications');
        
        if (permission === 'denied') {
            checkbox.checked = false;
            checkbox.disabled = true;
        }
    }
}

function requestNotificationPermission() {
    if (!('Notification' in window)) {
        showToast('Not Supported', 'Browser notifications are not supported!', 'danger');
        document.getElementById('browserNotifications').checked = false;
        return;
    }
    
    Notification.requestPermission().then(permission => {
        if (permission === 'granted') {
            showToast('Enabled!', 'Browser notifications enabled!', 'success');
            saveNotificationSettings();
            
            // Send test notification
            new Notification('FET Notifications', {
                body: 'You will now receive notifications for expiring items!',
                icon: 'https://ui-avatars.com/api/?name=FET&background=10b981&color=fff'
            });
        } else {
            showToast('Denied', 'Please allow notifications in your browser settings.', 'danger');
            document.getElementById('browserNotifications').checked = false;
        }
    });
}

// === THEME MANAGEMENT ===
function changeTheme(theme, element) {
    // Update active state
    document.querySelectorAll('.theme-option').forEach(option => {
        option.classList.remove('active');
    });
    element.classList.add('active');
    
    // Save theme
    localStorage.setItem('fetTheme', theme);
    
    // Apply theme
    applyTheme(theme);
    
    showToast('Theme Changed!', `Switched to ${theme} theme!`, 'success');
}

function applyTheme(theme) {
    const body = document.body;
    const root = document.documentElement;
    
    // Remove all theme classes
    body.classList.remove('theme-light', 'theme-dark');
    
    if (theme === 'dark') {
        body.classList.add('theme-dark');
        
        // Dark theme CSS variables
        root.style.setProperty('--light-bg', '#0f172a');
        root.style.setProperty('--text-dark', '#f8fafc');
        root.style.setProperty('--text-light', '#cbd5e1');
        root.style.setProperty('--white', '#1e293b');
        root.style.setProperty('--border-color', '#334155');
        
        // Update cards
        document.querySelectorAll('.stat-card, .food-card, .filter-section, .modal-content').forEach(el => {
            el.style.background = '#1e293b';
            el.style.color = '#f8fafc';
        });
        
    } else if (theme === 'auto') {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        applyTheme(prefersDark ? 'dark' : 'light');
        
    } else {
        // Light theme (default)
        body.classList.add('theme-light');
        
        root.style.setProperty('--light-bg', '#f8fafc');
        root.style.setProperty('--text-dark', '#1e293b');
        root.style.setProperty('--text-light', '#64748b');
        root.style.setProperty('--white', '#ffffff');
        root.style.setProperty('--border-color', '#e2e8f0');
        
        // Reset cards
        document.querySelectorAll('.stat-card, .food-card, .filter-section, .modal-content').forEach(el => {
            el.style.background = '#ffffff';
            el.style.color = '#1e293b';
        });
    }
}

// Apply saved theme on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('fetTheme') || 'light';
    applyTheme(savedTheme);
    
    // Update active button
    document.querySelectorAll('.theme-option').forEach(option => {
        if (option.getAttribute('onclick').includes(`'${savedTheme}'`)) {
            option.classList.add('active');
        }
    });
});

// === DATA MANAGEMENT ===
function exportData() {
    const foodItems = localStorage.getItem('fetFoodItems') || '[]';
    const user = localStorage.getItem('fetUser') || '{}';
    const settings = localStorage.getItem('fetNotificationSettings') || '{}';
    
    const exportData = {
        version: '1.0.0',
        exportDate: new Date().toISOString(),
        data: {
            foodItems: JSON.parse(foodItems),
            user: JSON.parse(user),
            settings: JSON.parse(settings)
        }
    };
    
    // Create blob and download
    const blob = new Blob([JSON.stringify(exportData, null, 2)], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `fet-backup-${new Date().toISOString().split('T')[0]}.json`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
    
    showToast('Exported!', 'Your data has been downloaded!', 'success');
}

function importData(event) {
    const file = event.target.files[0];
    if (!file) return;
    
    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            const importData = JSON.parse(e.target.result);
            
            // Validate data structure
            if (!importData.data || !importData.data.foodItems) {
                throw new Error('Invalid data format');
            }
            
            // Confirm import
            if (!confirm('This will replace your current data. Continue?')) {
                return;
            }
            
            // Import data
            if (importData.data.foodItems) {
                localStorage.setItem('fetFoodItems', JSON.stringify(importData.data.foodItems));
            }
            if (importData.data.user) {
                localStorage.setItem('fetUser', JSON.stringify(importData.data.user));
            }
            if (importData.data.settings) {
                localStorage.setItem('fetNotificationSettings', JSON.stringify(importData.data.settings));
            }
            
            showToast('Imported!', 'Data imported successfully! Reloading...', 'success');
            
            // Reload page after 2 seconds
            setTimeout(() => {
                window.location.reload();
            }, 2000);
            
        } catch (error) {
            showToast('Error', 'Failed to import data. Invalid file format.', 'danger');
            console.error('Import error:', error);
        }
    };
    reader.readAsText(file);
    
    // Reset file input
    event.target.value = '';
}

function calculateStorage() {
    try {
        let totalSize = 0;
        
        for (let key in localStorage) {
            if (localStorage.hasOwnProperty(key) && key.startsWith('fet')) {
                totalSize += localStorage[key].length + key.length;
            }
        }
        
        // Convert to KB
        const sizeKB = (totalSize / 1024).toFixed(2);
        const sizeMB = (totalSize / (1024 * 1024)).toFixed(2);
        
        // Estimate max storage (usually 5-10MB)
        const maxStorageMB = 5;
        const percentUsed = ((sizeMB / maxStorageMB) * 100).toFixed(1);
        
        const storageInfo = document.getElementById('storageInfo');
        if (sizeMB < 1) {
            storageInfo.textContent = `${sizeKB} KB used (${percentUsed}% of ${maxStorageMB}MB)`;
        } else {
            storageInfo.textContent = `${sizeMB} MB used (${percentUsed}% of ${maxStorageMB}MB)`;
        }
        
        // Show warning if over 80%
        if (percentUsed > 80) {
            storageInfo.style.color = '#ef4444';
            storageInfo.innerHTML += ' <i class="fas fa-exclamation-triangle"></i>';
        } else {
            storageInfo.style.color = '#64748b';
        }
        
    } catch (error) {
        document.getElementById('storageInfo').textContent = 'Unable to calculate storage';
    }
}

// === PASSWORD MANAGEMENT ===
function openChangePasswordModal() {
    const modal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
    modal.show();
}

function handleChangePassword(event) {
    event.preventDefault();
    
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmNewPassword').value;
    
    // Validate
    if (newPassword.length < 6) {
        showToast('Error', 'Password must be at least 6 characters!', 'danger');
        return;
    }
    
    if (newPassword !== confirmPassword) {
        showToast('Error', 'Passwords do not match!', 'danger');
        return;
    }
    
    // In real app, verify current password and update in backend
    // For demo, just show success
    showToast('Success!', 'Password changed successfully!', 'success');
    
    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
    modal.hide();
    
    // Reset form
    document.getElementById('changePasswordForm').reset();
}

// === DANGER ZONE ===
function clearAllData() {
    if (!confirm('Are you sure you want to clear ALL data? This cannot be undone!')) {
        return;
    }
    
    if (!confirm('This will delete all your food items, settings, and preferences. Continue?')) {
        return;
    }
    
    // Clear all FET data
    for (let key in localStorage) {
        if (key.startsWith('fet')) {
            localStorage.removeItem(key);
        }
    }
    
    showToast('Cleared!', 'All data has been deleted. Redirecting...', 'success');
    
    setTimeout(() => {
        window.location.href = 'login.php';
    }, 2000);
}

function deleteAccount() {
    if (!confirm('Are you sure you want to DELETE your account? This cannot be undone!')) {
        return;
    }
    
    const confirmation = prompt('Type "DELETE" to confirm account deletion:');
    
    if (confirmation !== 'DELETE') {
        showToast('Cancelled', 'Account deletion cancelled.', 'info');
        return;
    }
    
    // Clear all data
    localStorage.clear();
    
    showToast('Account Deleted', 'Your account has been deleted. Goodbye!', 'danger');
    
    setTimeout(() => {
        window.location.href = 'index.php';
    }, 2000);
}

// === AUTO-SAVE SETTINGS ===
// Auto-save when user leaves input fields
document.addEventListener('DOMContentLoaded', function() {
    const inputs = ['settingsFullName', 'settingsEmail', 'settingsPhone', 'settingsLocation'];
    
    inputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('blur', function() {
                // Auto-save on blur (when user leaves the field)
                const user = JSON.parse(localStorage.getItem('fetUser') || '{}');
                user[inputId.replace('settings', '').toLowerCase()] = this.value;
                localStorage.setItem('fetUser', JSON.stringify(user));
            });
        }
    });
});

// === KEYBOARD SHORTCUTS ===
document.addEventListener('keydown', function(event) {
    // Ctrl/Cmd + S to save
    if ((event.ctrlKey || event.metaKey) && event.key === 's') {
        event.preventDefault();
        saveProfile();
    }
    
    // Ctrl/Cmd + E to export
    if ((event.ctrlKey || event.metaKey) && event.key === 'e') {
        event.preventDefault();
        exportData();
    }
});

// === NOTIFICATION SCHEDULER ===
function scheduleNotifications() {
    const settings = JSON.parse(localStorage.getItem('fetNotificationSettings') || '{}');
    
    if (!settings.expiryNotifications || !settings.browserNotifications) {
        return;
    }
    
    const notificationTiming = parseInt(settings.notificationTiming || 3);
    const foodItems = JSON.parse(localStorage.getItem('fetFoodItems') || '[]');
    
    foodItems.forEach(item => {
        const daysLeft = calculateDaysRemaining(item.expiryDate);
        
        if (daysLeft === notificationTiming) {
            sendNotification(
                'Food Expiring Soon!',
                `${item.name} will expire in ${daysLeft} day${daysLeft !== 1 ? 's' : ''}!`
            );
        }
    });
}

function sendNotification(title, body) {
    if ('Notification' in window && Notification.permission === 'granted') {
        new Notification(title, {
            body: body,
            icon: 'https://ui-avatars.com/api/?name=FET&background=10b981&color=fff',
            badge: 'https://ui-avatars.com/api/?name=FET&background=10b981&color=fff'
        });
    }
}

// Check for notifications every hour
setInterval(scheduleNotifications, 3600000); // 1 hour

// === EXPORT FOR TESTING ===
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        saveProfile,
        saveNotificationSettings,
        exportData,
        importData,
        calculateStorage,
        changeTheme
    };
}

// === CONSOLE INFO ===
console.log('%c⚙️ Settings Module Loaded', 'color: #10b981; font-size: 16px; font-weight: bold;');
console.log('%c💡 Tip: Press Ctrl+S to save settings!', 'color: #fbbf24; font-size: 11px;');