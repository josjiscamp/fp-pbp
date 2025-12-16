<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - FET | Food Expiry Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #10b981;
            --dark-bg: #0f172a;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --light-bg: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            background-color: var(--light-bg);
        }

        .navbar {
            background: var(--dark-bg);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: white !important;
        }

        .navbar-brand i {
            color: var(--primary-green);
        }

        .btn-back {
            background: var(--primary-green);
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: #059669;
            color: white;
            transform: translateY(-2px);
        }

        .page-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            padding: 80px 0 60px;
            text-align: center;
        }

        .page-header h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .page-header p {
            font-size: 18px;
            opacity: 0.9;
        }

        .content-section {
            padding: 80px 0;
        }

        .content-card {
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.08);
        }

        .last-updated {
            background: #dcfce7;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 40px;
            color: var(--text-dark);
            font-weight: 600;
        }

        .content-card h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin-top: 40px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid var(--primary-green);
        }

        .content-card h2:first-of-type {
            margin-top: 0;
        }

        .content-card h3 {
            font-size: 22px;
            font-weight: 600;
            color: var(--text-dark);
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .content-card p, .content-card li {
            font-size: 16px;
            line-height: 1.8;
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .content-card ul, .content-card ol {
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .content-card li {
            margin-bottom: 10px;
        }

        .highlight-box {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }

        .highlight-box strong {
            color: #f59e0b;
        }

        .info-box {
            background: #f0fdf4;
            border-left: 4px solid var(--primary-green);
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }

        .footer {
            background: var(--dark-bg);
            color: rgba(255,255,255,0.8);
            padding: 40px 0 20px;
            text-align: center;
        }

        .footer a {
            color: var(--primary-green);
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 36px;
            }

            .content-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i></i> FET
            </a>
            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>
        </div>
    </nav>

    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-file-contract"></i> Terms of Service</h1>
            <p>Please read these terms carefully before using FET</p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="content-card">
                <div class="last-updated">
                    <i class="fas fa-calendar-alt"></i> Last Updated: December 16, 2025
                </div>

                <p>Welcome to FET (Food Expiry Tracker). By accessing or using our service, you agree to be bound by these Terms of Service. Please read them carefully.</p>

                <h2>1. Acceptance of Terms</h2>
                <p>By creating an account or using FET in any way, you agree to:</p>
                <ul>
                    <li>Comply with these Terms of Service</li>
                    <li>Follow our Privacy Policy</li>
                    <li>Accept responsibility for your account and activities</li>
                    <li>Provide accurate and truthful information</li>
                </ul>
                <p>If you do not agree to these terms, please do not use our service.</p>

                <h2>2. Description of Service</h2>
                <p>FET is a food expiry tracking application that helps you:</p>
                <ul>
                    <li>Track food items and their expiration dates</li>
                    <li>Receive visual alerts for expiring items</li>
                    <li>Organize food by categories</li>
                    <li>Upload photos of food items</li>
                    <li>Manage your food inventory efficiently</li>
                </ul>

                <div class="info-box">
                    <strong>Free Service:</strong> FET is provided free of charge. We reserve the right to modify, suspend, or discontinue any part of the service at any time.
                </div>

                <h2>3. User Accounts</h2>

                <h3>3.1 Account Creation</h3>
                <p>To use certain features, you must create an account. You agree to:</p>
                <ul>
                    <li>Provide accurate, current, and complete information</li>
                    <li>Maintain and update your information</li>
                    <li>Keep your password secure and confidential</li>
                    <li>Notify us immediately of any unauthorized access</li>
                    <li>Accept responsibility for all activities under your account</li>
                </ul>

                <h3>3.2 Guest Mode</h3>
                <p>You may use FET as a guest without creating an account. Guest data is stored locally in your browser and is not backed up to our servers.</p>

                <h3>3.3 Account Termination</h3>
                <p>We reserve the right to terminate or suspend your account if:</p>
                <ul>
                    <li>You violate these Terms of Service</li>
                    <li>You engage in fraudulent or illegal activities</li>
                    <li>Your account has been inactive for an extended period</li>
                    <li>We are required to do so by law</li>
                </ul>

                <h2>4. User Conduct</h2>

                <h3>4.1 Acceptable Use</h3>
                <p>You agree to use FET only for lawful purposes. You must NOT:</p>
                <ul>
                    <li>Upload harmful, offensive, or inappropriate content</li>
                    <li>Attempt to hack, disrupt, or damage our systems</li>
                    <li>Use automated tools to access the service (bots, scrapers)</li>
                    <li>Impersonate others or create fake accounts</li>
                    <li>Violate any applicable laws or regulations</li>
                    <li>Interfere with other users' access to the service</li>
                    <li>Collect or harvest user data without permission</li>
                </ul>

                <h3>4.2 Content Standards</h3>
                <p>Any content you upload (photos, text) must:</p>
                <ul>
                    <li>Be appropriate and relevant to food tracking</li>
                    <li>Not infringe on intellectual property rights</li>
                    <li>Not contain malware or harmful code</li>
                    <li>Not violate privacy rights of others</li>
                </ul>

                <h2>5. Intellectual Property</h2>

                <h3>5.1 Our Rights</h3>
                <p>FET and all its content, features, and functionality are owned by us and protected by intellectual property laws. This includes:</p>
                <ul>
                    <li>The FET name and logo</li>
                    <li>Software code and design</li>
                    <li>User interface and graphics</li>
                    <li>Documentation and content</li>
                </ul>

                <h3>5.2 Your Rights</h3>
                <p>You retain all rights to the content you upload (food photos, descriptions). By using FET, you grant us a limited license to:</p>
                <ul>
                    <li>Store and display your content within the service</li>
                    <li>Process your data to provide features</li>
                    <li>Back up your data for service reliability</li>
                </ul>

                <h2>6. Disclaimer of Warranties</h2>

                <div class="highlight-box">
                    <strong>Important:</strong> FET is provided "as is" without warranties of any kind, either express or implied.
                </div>

                <p>We do not guarantee that:</p>
                <ul>
                    <li>The service will be uninterrupted or error-free</li>
                    <li>All data will be accurate or complete</li>
                    <li>Defects will be corrected immediately</li>
                    <li>The service is free from viruses or harmful components</li>
                </ul>

                <h3>6.1 Food Safety Disclaimer</h3>
                <p><strong>FET is a tracking tool only.</strong> We do not:</p>
                <ul>
                    <li>Provide food safety advice or recommendations</li>
                    <li>Guarantee the safety of any food item</li>
                    <li>Replace professional food safety guidelines</li>
                    <li>Accept liability for food-related illness or injury</li>
                </ul>
                <p><strong>Always use your judgment and follow proper food safety practices. When in doubt, throw it out!</strong></p>

                <h2>7. Limitation of Liability</h2>
                <p>To the maximum extent permitted by law, FET and its creators shall not be liable for:</p>
                <ul>
                    <li>Any indirect, incidental, or consequential damages</li>
                    <li>Loss of data, profits, or business opportunities</li>
                    <li>Food spoilage, waste, or health issues</li>
                    <li>Damages resulting from unauthorized access to your account</li>
                    <li>Any damages exceeding the amount you paid to use FET (which is $0)</li>
                </ul>

                <h2>8. Indemnification</h2>
                <p>You agree to indemnify and hold harmless FET, its creators, and affiliates from any claims, damages, or expenses arising from:</p>
                <ul>
                    <li>Your violation of these Terms of Service</li>
                    <li>Your use of the service</li>
                    <li>Your violation of any rights of third parties</li>
                    <li>Content you upload to the service</li>
                </ul>

                <h2>9. Data Backup and Loss</h2>
                <p>While we make reasonable efforts to back up data:</p>
                <ul>
                    <li>We are not responsible for data loss due to technical failures</li>
                    <li>You should maintain your own backups of important information</li>
                    <li>Guest mode data is stored locally and not backed up by us</li>
                    <li>We recommend exporting your data regularly</li>
                </ul>

                <h2>10. Third-Party Services</h2>
                <p>FET may integrate with or link to third-party services. We are not responsible for:</p>
                <ul>
                    <li>Content or practices of third-party websites</li>
                    <li>Availability of external services</li>
                    <li>Privacy policies of third parties</li>
                </ul>
                <p>Your use of third-party services is at your own risk.</p>

                <h2>11. Modifications to Service</h2>
                <p>We reserve the right to:</p>
                <ul>
                    <li>Modify or discontinue features at any time</li>
                    <li>Change these Terms of Service with notice</li>
                    <li>Adjust service pricing (if applicable in the future)</li>
                    <li>Update technical requirements</li>
                </ul>
                <p>We will notify users of significant changes via email or in-app notification.</p>

                <h2>12. Governing Law</h2>
                <p>These Terms of Service are governed by the laws of Indonesia. Any disputes shall be resolved in accordance with Indonesian law.</p>

                <h2>13. Dispute Resolution</h2>
                <p>If you have a dispute with FET:</p>
                <ol>
                    <li>Contact us first to resolve the issue informally</li>
                    <li>If unresolved, we will attempt mediation</li>
                    <li>Legal action should be taken in Indonesian courts</li>
                </ol>

                <h2>14. Severability</h2>
                <p>If any provision of these terms is found to be unenforceable, the remaining provisions will continue in full effect.</p>

                <h2>15. Contact Information</h2>
                <p>For questions about these Terms of Service, contact us:</p>
                <ul>
                    <li><strong>Phone:</strong> <a href="tel:+6281453678765">+62 814-5367-8765</a></li>
                    <li><strong>Instagram:</strong> <a href="https://www.instagram.com/foodexptrack?igsh=ejNqemliN2dhcDZk" target="_blank">@foodexptrack</a></li>
                    <li><strong>Help Center:</strong> <a href="help-center.php">Visit our Help Center</a></li>
                </ul>

                <h2>16. Entire Agreement</h2>
                <p>These Terms of Service, together with our Privacy Policy, constitute the entire agreement between you and FET regarding the use of our service.</p>

                <div class="info-box">
                    <strong>By using FET, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service.</strong>
                </div>

                <p style="margin-top: 40px; text-align: center;">
                    <a href="index.php" style="color: var(--primary-green); font-weight: 600;">← Return to Home</a> | 
                    <a href="privacy-policy.php" style="color: var(--primary-green); font-weight: 600;">Read Privacy Policy →</a>
                </p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 FET - Food Expiry Tracker. <a href="index.php">Return to Home</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>