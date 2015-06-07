<?php
//views/welcome_page.php
$this->load->view($this->config->item('theme') . 'header');
?>

<div id="instruction" class="main-box-container">
    
    <a href="/gigcentral/index">
        <div id="find-gig" class="main-box">
        <div class="inner-box">
            <h1><i class="fa fa-search"></i></h1>
            <h3>Find a gig</h3>
            <div class="bar"></div>
            <p>Are you looking for a work that you can sharpen your dev skills? Find who is looking for you.</p>
        </div></div>
    </a>
    
    <a href="/gigcentral/create">
        <div id="post-gig" class="main-box">
        <div class="inner-box">
            <h1><i class="fa fa-briefcase"></i></h1>
            <h3>Post a gig</h3>
            <div class="bar"></div>
            <p>Are you hiring a deveoper who can help your website building? Share with us</p>
        </div></div>
    </a>
    
    <a href="/startups/index">
        <div id="post-venue" class="main-box">
        <div class="inner-box">
            <h1><i class="fa fa-map-marker"></i></h1>
            <h3>Find a venue</h3>
            <div class="bar"></div>
            <p>Are you a start up looking for a place to gether and work? See our list</p>
        </div></div>
    </a>
    
    <a href="/startups/create">
        <div id="post-gig" class="main-box">
        <div class="inner-box">
            <h1><i class="fa fa-share-alt"></i></h1>
            <h3>Share a venue</h3>
            <div class="bar"></div>
            <p>Do you know a good place to for starups? Please share.</p>
            </div></div>
    </a>
    
</div>
<div class="clear-both"></div>

    
<div class="big">
    <div class="column1">
        <div class="inner-column">
            <h2>Recent Gig Posts</h2>
            <p><a href=""> Read More &raquo;</a> </p>
            <div class="post">
                <ul class="list">
                    <li>
                        <a href=""><h4 class="job">Web Developer </h4></a>
                        <h5 class="city">Seattle</h5>
                    <p>Need a good developer for cheap. Need a good developer for cheap.Need a good developer for cheap.Need a good developer for cheap. </p>
                    </li>
                    <li>
                        <a href=""><h4 class="job">Database Developer</h4></a>
                        <h5 class="city">Bellevue</h5>
                        <p>In search of starving brilliant students to build my startup for no pay.In search of starving brilliant students to build my startup for no pay.In search of starving brilliant students to build my startup for no pay.</p>
                    </li>
                    <li>
                        <a href=""><h4 class="job">Python</h4></a>
                        <h5 class="city">Seattle</h5>
                        <p>Need a good developer for cheap. Need a good developer for cheap.Need a good developer for cheap.Need a good developer for cheap. </p>
                    </li>
                    <li>
                        <a href=""><h4 class="job">PHP Expert</h4></a>
                        <h5 class="city">Bellevue</h5>
                        <p>Need a good developer for cheap. Need a good developer for cheap.Need a good developer for cheap.Need a good developer for cheap. </p>
                    </li>
                    <li>
                        <a href=""><h4 class="job">Python Programmer</h4></a>
                        <h5 class="city">Seattle</h5>
                        <p>In search of starving brilliant students to build my startup for no pay.In search of starving brilliant students to build my startup for no pay.In search of starving brilliant students to build my startup for no pay.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="column2">
        <div class="inner-column">
             <h2>Startup venues near you</h2>
            <p><a href=""> View More &raquo;</a> </p>
            <iframe  class="map-small" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2689.802462434171!2d-122.329570067234!3d47.61053059741379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1433644130897"  frameborder="0" style="border:0"></iframe>
        </div>
    </div>
</div>

<div class="clear-both"></div>


<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
