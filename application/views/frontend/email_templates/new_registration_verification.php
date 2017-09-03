Hi <?= $username; ?>,
	Your Email Verification Link is <a href="<?= site_url(); ?>/register/email_verification?email_verification_token=<?= $email_verification_token; ?>">Email Verification Token</a>