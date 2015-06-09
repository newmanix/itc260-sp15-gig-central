<?php
$this->load->view($this->config->item('theme').'header');
?>
<script type="text/javascript">
var js = $.noConflict();
js(document).ready(function(){
	js(document).on('click','.scrollup',function(){
	  js("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});
js('.pop_loader').on('click', function ( e ) {
		js("#popup").show();
	});
	js(window).scroll(function(){
		if(js(this).scrollTop() > 100) {
		    js('.scrollup').fadeIn();
		} else {
			js('.scrollup').fadeOut();
		}
	}); 	
//faq toggle answers
	 js('#faq h3').click(function() {            
	    js(this).next('.answer').slideToggle(500);
	    js(this).toggleClass('close2');     
	  });
	
</script>

    <div class="row">
        <div class="col-lg-6 col-sm-12">
		<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
            <h1>Gig FAQ</h1>
            <div class="bs-component">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">FQAs</h2>
					
                    </div>
                    <div class="panel-body">
						<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3> Q : What web browser should I use? </h3>
						<div class="answer">
						<p>	A : To make sure you have the best experience possible, we recommend using the most up-to-date version of one of the following browsers:
						<ul>
						<li>Internet Explorer</li>
						<li>Firefox</li>
						<li>Chrome</li>
						</ul>
						</div>
						</p>
						</div>
					<!--do i really need this ?<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">-->
						<h3> Q: How will my personal information be used? </h3>
						<div class="answer">
						<p>	A: With your authorization we share some personal information with employers.  Otherwise all personal information will be kept private.  We do not sell personal information to other organizations.</p>
						</div>
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3>  Q : I signed up to receive Job notifications, but I am unable to apply/login to submit my application.</h3>
						<div class="answer">
						<p>	 A : Job Interest Card requests are independent of GigCentral.com applicant accounts. To create an applicant account, go to www.GigCentral.com and click on Sign In. Under the Sign In button, click Don't have an account? Create one. Complete the required new job seeker account information, enter a new password, and click Save.</p>
					</div>	
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3> Q : How do I apply for a job? </h3>
						<div class="answer">
						<p>	A :  To apply for a job, go to GigCentral.com website. If you are on GigCentral.com, go to the Find a gig page and enter search criteria in the boxes for Job Title, Keyword, and/or City or State. You can also search by clicking a Category or Location.
						<ul>
						<li>If you are on an organization's website, locate where open positions are posted.</li>
						<li>Perform a job search to find jobs that match your interests. Then click on the job title to view the job posting.</li>
						<li>To initiate the application process click the Apply tab. The Apply tab is located toward the top of the posting next to Job Details.</li>
						<li>Once you click on the link and log in, you can work on the application process steps.</li>						
						</ul>
						</p>
						</div>
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3>  Q : How can I be sure my application was received?</h3>
						<div class="answer">
						<p>	 A :  Once you've submitted your application, you see a confirmation message that you've successfully applied with the organization. You are also sent a confirmation email. To verify the status online, log into your account, and click on the Application tab.</p>
						</div>	
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3>  Q : Can I delete applications I previously submitted? </h3>
						<div class="answer">
						<p>	 A : No. Once the application is submitted to the organization, a record remains in the Application Status area of your account.</p>
						</div>	
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3> Q : How can I get in touch with the organization with which I've applied?</h3>
						<div class="answer">
						<p>	 A : There are several places where you may find an organization's contact information:
						<ul>
						<li>On the organization's website.</li>
						<li>On the job posting (typically at the bottom of the page).</li>
						<li>On your submitted application. Select click here for a printable version of your application and the organization contact information appears at the very top of the page.</li>
						</ul>
						</p>
						</div>	
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3>  Q : I submitted a request reset my password, but I didn't receive an email with instructions. What should I do ?   </h3>
						<div class="answer">
						<p>	A :  Click  Contact Us or email Customer Service at xxxx@gigCentral.com or 1 (888) xxx-xxxx. </p>
						</div>	
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3>  Q : I can't remember my username what should I do ?  </h3>
						<div class="answer">
						<p>	A :  Click  Contact Us or email Customer Service at xxxx@gigCentral.com or 1 (888) xxx-xxxx.</p>
						</div>	
					<div id="faq_width" class="h-space space-5 cms-contact-block"><section id="faq">
						<h3> Q: How do I change my password? </h3>
						<div class="answer">
						<p>	A: If you wish to change your password, please follow these steps: 
						<ol>
						<li>When you are logged in, go to the profiles page </li>
						<li>Select Edit next to the piece of information you wish to update.</li>
						<li>Enter your new information in the appropriate fields.</li>
						<li>Select Save to confirm changes</li>
						</ol>
						</p>
						</div>							
						
						
				   </div>
                </div><!-- end .panel div -->
            </div>
		</div></section>
        </div><!-- end .col div -->
    </div><!-- end .row div -->
                   
<!--p>
<pre>
Q: How do I change my password? 

A: If you wish to change your password, please follow these steps: 
		1. When you are logged in, hold the cursor over your name at the top right of any gigCentral.com page to see the account menu.
	2. Select the My profile link. 
	3. In the Login information section located in the middle of the page, select the Edit link.

Q: I forgot or never received my user name and/or password how can I get it? 

A : To retrieve your username or password please follow these steps:
	1. Go to the login help page.
	2. Enter the email address associated with your gigcentral.com account and click send.
 
You'll receive an email with your user name and instructions to reset your password soon.  For security, the link to reset your password will expire in XX hours.
 
If you do not receive the email from us shortly, be sure to check your spam and junk folders.


Q : I can’t remember my username what should I do ? 

A :  Go to recover your username by entering your email address. If you can't remember your email address, contact Customer Service at xxxx@gigCentral.com or 1 (888) xxx-xxxx. 
 
Q : I submitted a request reset my password, but I didn’t receive an email with instructions. What should I do ?   

A : Check your junk and spam folders for a message from  xxxx@gigCentral.com

Q : How do I change my user name ? 

A : If you wish to change your username, please follow these steps:

1. When you are logged in, hold the cursor over your name at the top right of any GigCentral.com page to see the account menu.
2. Select the My profile link.
3. Select Edit next to the piece of information you wish to update.
4. Enter your new information in the appropriate fields.
5. Select Save to confirm changes
 

Q : I signed up to receive Job notifications (Job Interest), but I am unable to apply/login to submit my application.

A : Job Interest Card requests are independent of GigCentral.com applicant accounts. To create an applicant account, go to www.GigCentral.com and click on Sign In. Under the Sign In button, click Don’t have an account? Create one. Complete the required new job seeker account information, enter a new password, and click Save.


Q : How do I apply for a job?

A :  To apply for a job, go to GigCentral.com website. If you are on GigCentral.com, enter search criteria in the boxes for Job Title, Keyword, and/or City or State. You can also search by clicking a Category or Location.
If you are on an organization’s website, locate where open positions are posted.
Perform a job search to find jobs that match your interests. Then click on the job title to view the job posting.
To initiate the application process click the Apply tab. The Apply tab is located toward the top of the posting next to Job Details.
Once you click on the link and log in, you can work on the application process steps.

Q : How can I be sure my application was received?

A :  Once you’ve submitted your application, you see a confirmation message that you’ve successfully applied with the organization. You are also sent a confirmation email. To verify the status online, log into your account, and click on the Application tab.

Q : Can I delete applications I previously submitted?

A : No. Once the application is submitted to the organization, a record remains in the Application Status area of your account.


Q : How can I get in touch with the organization with which I’ve applied?

A : There are several places where you may find an organization’s contact information:
On the organization’s website.
On the job posting (typically at the bottom of the page).
On your submitted application. Select click here for a printable version of your application and the organization contact information appears at the very top of the page.

Q : What web browser should I use?

A : To make sure you have the best experience possible, we recommend using the most up-to-date version of one of the following browsers:
Internet Explorer
Firefox
Chrome

Q: How will my personal information be used?

A: With your authorization we share some personal information with employers.  Otherwise all personal information will be kept private.  We do not sell personal information to other organizations. 

</pre>
</p-->
<?php
$this->load->view($this->config->item('theme').'footer');
?>