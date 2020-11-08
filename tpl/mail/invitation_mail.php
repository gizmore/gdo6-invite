<pre>
Hello <?php echo $email; ?>,

You have been invited by <?php echo $user->displayName(); ?>, a user on <?php echo sitename(); ?>.

If you like you can reply to him or visit <?=$link_site?> to learn more.

If you have concerns you can contact <?php echo GWF_ADMIN_EMAIL ?>.

Kind Regards
The <?php echo sitename(); ?> Invitation Module
</pre>
