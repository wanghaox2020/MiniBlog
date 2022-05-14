<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description">
    <meta name="author">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: index.php");
}
?>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;"> 
<div class="container-fluid">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <?php
    printf("<a class=\"navbar-brand\" href=\"home.php?category=all\">Home</a>");
    ?>
    <li class="nav-item">
        <?php
        printf("<a class=\"nav-link\" href=\"userpost.php\">My Posts</a>");
        ?>
    </li>

    <li class="nav-item">
        <?php
        printf("<a class=\"nav-link\" href=\"userquestion.php\">My Questions</a>");
        ?>
    </li>

    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
                include 'connectDB.php';
                $select = "select tag_name
                from Tag;";
            
                $stmt = $conn->prepare($select);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($tag_name);
                if ($stmt->num_rows > 0){
                    while ($row = $stmt->fetch()) {
                        printf("<li><a class=\"dropdown-item\" href=\"/home.php?category=%s\">%s</a></li>", $tag_name, $tag_name);
                    }
                }
                printf("<li><a class=\"dropdown-item\" href=\"/home.php?category=all\">All</a></li>");
              ?>
          </ul>
    </li>
    </ul>
</div>
    <form class="form-inline" method="POST">
    <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" name="search" class="form-control" placeholder="Search your question!" style="width: 38rem;"/>
        </div>
        <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
        </button>
    </div>

       

    <a href="/question.php" class="btn btn-info my-2 my-sm-0" style="margin:3px"> Post a new question</a>

    <a href="/logout.php" class="btn btn-info my-2 my-sm-0" style="margin:27px"> 
    Log Out
    </a>
    </form>
</div>
</nav>

<?php
    include 'connectDB.php';
    if(isset($_GET['category'])){
        $category=$_GET['category'];
    }else{
        $category="all";
    }
    
    if(isset($_POST['search'])){
        $search=$_POST['search'];
    }else{
        $search="";
    }

    if ($category == "" || $category == "all"){
        $select = "select question_id, uid, username, tag, title, body, question_time, status 
        from Question as q, Users as u
        where title like concat ('%', ?, '%')
        and q.uid = u.user_id
        order by DATE(question_time) desc;"; 
        $stmt = $conn->prepare($select);
        $stmt->bind_param('s', $search);
    }else{
        $select = "select question_id, uid, username, tag, title, body, question_time, status
        from Question as q, Tag as t, Users as u
        where q.tag = t.tag_id
        and q.uid = u.user_id
        and t.tag_name = ?
        and title like concat ('%', ?, '%')
        order by DATE(question_time) desc;";
        $stmt = $conn->prepare($select);
        $stmt->bind_param('ss', $category, $search);
    }
    
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($question_id, $uid, $username, $tag, $title, $body, $question_time, $status);

    if ($stmt->num_rows > 0){
        while ($row = $stmt->fetch()) {
            printf(
            "<div class=\"card-group\" style=\"display: inline-block;\">
                <div class=\"card mx-auto\" style=\"width: 80rem; margin:3px\">
                    <div class=\"card-body\">
                    <h5 class=\"card-title\">%s</h5>
                    <p class=\"card-text\">%s</p>
                    <div style=\"display: inline-flex\">
                        <a href=\"/post.php?qid=%s\" class=\"card-link\" style=\"margin: 5px;\">View the question</a>
                        <p class=\"card-text\" style=\"margin: 5px;\">(%s)</p> 
                    </div>
                    <div style=\"display: inline-flex;float: right;\">
                    <p class=\"card-text\" style=\"margin: 5px;\" >%s</p> 
                    <p class=\"card-text\" style=\"margin: 5px;\">%s</p>
                    </div>
                    </div>
                </div>
            </div>", $title, $body, $question_id, $status, $username, $question_time);
        }
    }

?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</html>