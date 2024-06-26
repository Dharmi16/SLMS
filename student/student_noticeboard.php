<?php
include('../src/php/dbconnect.php');
include('../src/php/news.php');
include('../src/php/announcement.php');

$data = new News($conn);
$result = $data->getNews();

$data1 = new Announcement($conn);
$result1 = $data1->getAnnouncement();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/home.css">
    <link rel="stylesheet" href="/src/css/student_home.css">
    <link rel="stylesheet" href="/src/css/notice.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Noticeboard</title>
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
                <i class="active"><a href="student_noticeboard.php"><img src="/src/img/icons/note text_active.svg"
                            alt=""></a>
                    <li><a href="student_noticeboard.php">Noticeboard</a><span>Noticeboard</span></li>
                </i>
                <i><a href="student_finance.php"><img src="/src/img/icons/wallet.svg" alt=""></a>
                    <li><a href="student_finance.php">Finance</a><span>Finance</span></li>
                </i>
                <i><a href="student_module.php"><img src="/src/img/icons/document.svg" alt=""></a>
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


    <main>
        <h2 style="color: #9C50CA;">Notice-Board</h2>
        <section class="announcement">
            <header class="calendar-header">
                <h3 style="color: #9C50CA; margin-left: 10px;">Announcement</h3>
            </header>
            <table class="announcement-table">   
          <tbody>
            <?php 
            $num = $result1->num_rows;
            if($num > 0){
                while($row = $result1->fetch_assoc()){
                    extract($row);
                    echo "<tr>";
                    echo "<td><li>$announcement</li></td>";
                    echo "</tr>";
                }
            }
            ?>
            <!-- <tr>
                <td><li>New academic programs are being offered.</li></td>
            </tr> -->
            </tbody>
            </table>
          </section>
    
        <section class="news-list">
          <h2 style="color: #9C50CA; margin-left: 10px;">News</h2>
            <table class="news-table">
                <tbody>
                    <?php
                    $num1 = $result->num_rows;
                    if($num1 > 0){
                        while($row1= $result->fetch_assoc()){
                            extract($row1);
                            echo "<tr>";
                            echo "<td><li>$news</li></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    <!-- <tr>
                        <td><li>College hosts art exhibition</li></td>
                    </tr> -->
                  </tbody>
                  </table>
        </section>
    
      </main>
</body>

</html>