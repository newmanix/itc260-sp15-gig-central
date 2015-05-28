<?php $this->load->view($this->config->item('theme').'header'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <h1>Flatly Example</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <h1>Form</h1>
            <div class="well bs-component">
                <form>
                    <fieldset>
                        <legend>
                            Form legend
                        </legend>
                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="email" class="form-control" id="userEmail" placeholder="user@example.com">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Example text area"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" id="firstName" placeholder="First name" class="form-control has-error">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <?= //generates form input type equals text using form helper class
                            form_input(array(
                                'name' => 'lastName',
                                'id' => 'lastName',
                                'class' => 'form-control'
                            )); ?>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Check here
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radioButtons" id="radioOne" value="radioOne" checked>
                                This is option one
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radioButtons" id="radioTwo" value="radioTwo">
                                This is option two
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radioButtons" id="radioThree" value="radioThree">
                                This is option three
                            </label>
                        </div>
                        <div class="form-group has-success has-feedback">
                            <label class="control-label sr-only" for="successInput">text input with Success</label>
                                <input type="text" class="form-control" id="successInput" placeholder="Success input">
                        </div>
                        <button type="submit" class="btn btn-default">Sign up</button>
                    </fieldset>
                </form>
            </div><!-- end .well .bs-compent div -->
        </div><!-- end .col div -->
    </div><!-- end .row div -->

    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <h1>Pager</h1>
            <div class="bs-component">
                <ul class="pagination">
                    <li class="disabled">
                        <a href="#"><<</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">>></a>
                    </li>
                </ul>
            </div>
        </div><!-- end .col div -->
    </div><!-- end .row div -->

    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <h1>Table</h1>
            <div class="bs-component">
                <table class="table well table-striped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Heading
                            </th>
                            <th>
                                Heading
                            </th><th>
                                Heading
                            </th><th>
                                Heading
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                            <td>
                                Content
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- end .col div -->
    </div><!-- end .row div -->

    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <h1>Panel</h1>
            <div class="bs-component">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">Primary panel header</h2>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div><!-- end .panel div -->
            </div>
        </div><!-- end .col div -->
    </div><!-- end .row div -->

    <div class="row">
        <div class="col-lg-10 col-sm-12">
            <div class="bs-component">
                <div class="jumbotron">
                    <h1>Large container heading</h1>
                    <p>Heading content, doesn't this look great? Oh my, why haven't I used Bootstrap before? I hope my next job uses Bootstrap.</p>
                    <p>
                        <a href="#" class="btn btn-large btn-primary">Click me</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div><!-- end .container div -->
<?php $this->load->view($this->config->item('theme').'footer'); ?>
