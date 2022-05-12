<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description">
    <meta name="author">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
</head>
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand">Home</a>
    <form class="form-inline">

    <!-- This is a comment 
    <input class="form-control mr-sm-2" type="search" placeholder="Search your question!" aria-label="Search">
    <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
    -->

    <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" class="form-control" placeholder="Search your question!"/>
        </div>
        <button type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
        </button>
    </div>
    
    <a href="/question.php" class="btn btn-info my-2 my-sm-0" style="margin:3px"> Post a new question</a>
    </form>
</nav>

<?php
    include 'connectDB.php';
    $select = "select *
    from Question
    order by DATE(question_time) desc;";

    $stmt = $conn->prepare($select);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($question_id, $uid, $tag, $title, $body, $question_time, $status);

    if ($stmt->num_rows > 0){
        while ($row = $stmt->fetch()) {
            printf(
            "<div class=\"card-group\" style=\"display: inline-block;\">
            <div class=\"card mx-auto\" style=\"width: 80rem; margin:3px\">
            <div class=\"card-body\">
            <h5 class=\"card-title\">%s</h5>
            <p class=\"card-text\">%s</p>
            <a href=\"/post.php\" class=\"card-link\">View the question</a>
            </div>
            </div>
            </div>", $title, $body);
        }
    }
?>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>