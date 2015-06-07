<?php
//views/welcome_page.php
$this->load->view($this->config->item('theme') . 'header');
?>

<div id="instruction" class="main-box-container">
    <a href="/gigcentral/index">
        <div id="p1" class="panel">
            <h1><i class="fa fa-search"></i></h1>
            <h3>Find a gig</h3>
            <div class="bar"></div>
            <p>Are you looking for a work that you can sharpen your dev skills? Find who is looking for you.</p>
        </div>
    </a>
    
    <a href="/gigcentral/create">
        <div id="p2" class="panel">
            <h1><i class="fa fa-briefcase"></i></h1>
            <h3>Post a gig</h3>
            <div class="bar"></div>
            <p>Are you hiring a deveoper who can help your website building? Share with us</p>
        </div>
    </a>
    
    <a href="/startups/index">
        <div id="p3" class="panel">
            <h1><i class="fa fa-map-marker"></i></h1>
            <h3>Find a venue</h3>
            <div class="bar"></div>
            <p>Are you a start up looking for a place to gether and work? See our list</p>
        </div>
    </a>
    
    <a href="/startups/create">
        <div id="p4" class="panel">
            <h1><i class="fa fa-share-alt"></i></h1>
            <h3>Share a venue</h3>
            <div class="bar"></div>
            <p>Do you know a good place to for starups? Please share.</p>
        </div>
    </a>
    
    <a href="/startups/create">
        <div id="p5" class="panel">
            <h3>Recent Gig Posts</h3>
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
    </a>
    
</div>

<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
