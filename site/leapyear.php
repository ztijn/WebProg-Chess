<?php
/* Header */
$page_title = 'Webprogramming Assignment 3 - Leap Year';
$navigation = Array(
    'active' => 'Leap Year',
    'items' => Array(
        'News' => '/WP19/assignment_3/index.php',
        'Add news item' => '/WP19/assignment_3/news_add.php',
        'Leap Year' => '/WP19/assignment_3/leapyear.php',
        'Simple Form' => '/WP19/assignment_3/simple_form.php'
    )
);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
    <div class="row wp-row">
        <div class="col-md-12">
            <br>
            <h1>
                <?php
                if (empty($_POST["name"])) {
                    echo "Welcome!";
                } else {
                    echo "Welcome " . $_POST["name"] . "!";
                }
                ?>
            </h1>
            <p>
                <?php
                if (empty($_POST["place"])) {
                    echo "Please Enter your name, age, email and place of residence to find out what your age will be the next 5 leap years!";
                } elseif ($_POST["place"] == "Groningen") {
                    echo "Great to have someone from Groningen visit this website!";
                } else {
                    echo "";
                }
                ?>
            </p>
            <?php
            if (isset($_POST["place"])) {
            ?>
                <table class="table table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Year</th>
                        <th scope="col">Age</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2020</td>
                        <td><?php echo $_POST["age"] + 1; ?></td>
                    </tr>
                    <tr>
                        <td>2024</td>
                        <td><?php echo $_POST["age"] + 5; ?></td>
                    </tr>
                    <tr>
                        <td>2028</td>
                        <td><?php echo $_POST["age"] + 9; ?></td>
                    </tr>
                    <tr>
                        <td>2032</td>
                        <td><?php echo $_POST["age"] + 13; ?></td>
                    </tr>
                    <tr>
                        <td>2036</td>
                        <td><?php echo $_POST["age"] + 17; ?></td>
                    </tr>

                    </tbody>
                </table>
            <?php
            }
            ?>
            <br>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please fill in your name!</div>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Enter your age">
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please fill in your age!</div>
                </div>
                <div class="form-group">
                    <label for="mail">Email address</label>
                    <input type="text" class="form-control" id="mail" name="mail" placeholder="Enter your email address">
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please fill in a valid email address!</div>
                </div>
                <div class="form-group">
                    <label for="place">Place/residence</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Enter your place of residence">
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please fill in your place of residence!</div>
                </div>
                <div id="confirm" class="btn btn-primary">Submit</div>
            </form>
        </div>
    </div>

    <script type="application/javascript" src="scripts/leapyear.js"></script>
<?php
include __DIR__ . '/tpl/body_end.php';
?>