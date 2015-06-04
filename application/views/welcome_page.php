<?php
//views/welcome_page.php
$this->load->view($this->config->item('theme') . 'header');
?>
<h2>This is Home page for Gig Central and Startup Central</h2>

<div id="instruction" class="main-box-container">
    
    <a href="/gigcentral/index">
        <div id="find-gig" class="main-box">   
            <h3>Find a gig</h3>
            <p>Are you looking for a work that you can sharpen your dev skills? Find who is looking for you.</p>
        </div>
    </a>
    
    <a href="/gigcentral/create">
        <div id="post-gig" class="main-box">
            <h3>Post a gig</h3>
            <p>Are you hiring a deveoper who can help your website building? Share with us</p>
        </div>
    </a>
    
    <a href="/startups/index">
        <div id="post-venue" class="main-box">
            <h3>Find a venue for start ups</h3>
            <p>Are you a start up looking for a place to gether and work? See our list</p>
        </div>
    </a>
    
    <a href="/startups/create">
        <div id="post-gig" class="main-box">
            <h3>Share a venue for start ups</h3>
            <p>Do you know a good place to for starups? Please share.</p>
        </div>
    </a>
    
</div>

<div id="recent-gig">
    
</div>


<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
