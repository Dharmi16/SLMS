<?php
session_start();
include('../src/php/dbconnect.php');
include('../src/php/module.php');
include('../src/php/student_data.php');

$student =  new Student($conn,$_SESSION['username']);
$student_data = $student->getStudent();
$sem;
if ($student_data->num_rows > 0) {
    while ($row = $student_data->fetch_assoc()) {
        $sem = $row['sem'];
    }
}

$data = new Module($conn);
$result = $data->getModule($sem);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/home.css">
    <link rel="stylesheet" href="/src/css/student_home.css">
    <link rel="stylesheet" href="/src/css/module.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Module</title>
</head>

<body>
    <div class="sidebar">
        <img src="/src/img/icons/SLMS.svg">
        <nav>
            <ul>
                <i><a href="student_home.php"><img src="/src/img/icons/deshboard_icon_inactive.svg"></a>
                    <li><a href="student_home.php">Dashboard</a><span>Dashboard</span></li>
                </i>
                <i><a href="student_class.php"><img src="/src/img/icons/clieant.svg" alt=""></a>
                    <li><a href="student_class.php">Class</a><span>Class</span></li>
                </i>
                <i><a href="student_event.php"><img src="/src/img/icons/calendar.svg" alt=""></a>
                    <li><a href="student_event.php">Events</a><span>Events</span></li>
                </i>
                <i><a href="student_noticeboard.php"><img src="/src/img/icons/note text.svg" alt=""></a>
                    <li><a href="student_noticeboard.php">Noticeboard</a><span>Noticeboard</span></li>
                </i>
                <i><a href="student_finance.php"><img src="/src/img/icons/wallet.svg" alt=""></a>
                    <li><a href="student_finance.php">Finance</a><span>Finance</span></li>
                </i>
                <i class="active"><a href="student_module.php"><img src="/src/img/icons/document_active.svg" alt=""></a>
                    <li><a href="student_module.php">Module</a><span>Module</span></li>
                </i>
                <i><a href="student_placement.php"><img src="/src/img/icons/briefcase.svg" alt=""></a>
                    <li>
                        <pre><a href="student_placement.php">Training/
placement</a><span>Training/
    placement</span></pre>
                    </li>
                </i>
                <i class="logout"><a href="#"><img src="/src/img/icons/logout.svg" alt=""></a>
                    <li><a href="/src/php/logout.php">Logout</a><span>Logout</span></li>
                </i>

            </ul>
        </nav>
    </div>
    <div class="srch">
        <form action="/src/php/home.php" method="post">
            <input type="search" name="srch" class="srchbar">
            <input type="submit" value="submit" class="srchicon">
        </form>

        <div class="notipro">
            <div class="notification">
                <img src="/src/img/icons/notification.svg" alt="">
            </div>
            <div class="profile">
            <a class="profile" href="student_profile.html">
                <img src="/src/img/icons/profile.svg" alt=""></a>
            </div>
        </div>
    </div>
    <section class="content">

    <?php
    $num = $result->num_rows;

    if($num > 0 ){
        while($row = $result->fetch_assoc()){
            extract($row);
            echo "<div class=\"module\"> ";
            echo "<h2>$name</h2>";
            echo "<h3>$type</h3>";
            echo "<p>$detail</p>";
            echo "<a href=\"http://slms/module/$link\" download=\"$link\" class=\"button\">View</a>";
            echo "</div>";
        }
    }
    else{
        echo json_encode(array('message' => ' nothing'));
    
    }
    ?>
    <!-- <div class="module">
        <h2>Module 1</h2>
        <h3>Assignments</h3>
        <p>Here is a list of assignments you have to do during this year/month/week.</p>
        <a href="#" class="button">View</a>
      </div>
     -->
    </section>
</body>

</html>