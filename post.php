<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description">
    <meta name="author">
    <meta name="generator" content="Hugo 0.88.1">
    <title>my post</title>

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
    
    if(isset($_GET['qid'])){
        $qid=$_GET['qid'];
    }else{
        echo '<script>alert("Invalid qid, please try again!")</script>';
    }

    include 'connectDB.php';
    $select = "select question_id, uid, username, tag, title, body, question_time, status
        from Question as q, Users as u
        where question_id=?
        and q.uid = u.user_id;";
    $stmt = $conn->prepare($select);
    $stmt->bind_param('s', $qid);
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
            <p>%s</p>
            </div>
            </div>
            </div>", $title, $body, $username);
        }
    }

    $select = "select post_id, qid, uid, username, content, thumb_ups, post_time
        from Post as p, Users as u
        where qid=?
        and p.uid = u.user_id
        order by DATE(post_time) asc;";
    $stmt = $conn->prepare($select);
    $stmt->bind_param('s', $qid);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($post_id, $qid, $uid, $username, $content, $thumb_ups, $post_time); 

    if ($stmt->num_rows > 0){
        while ($row = $stmt->fetch()) {
            printf(
            "<div class=\"card-group\" style=\"display: inline-block;\">
            <div class=\"card mx-auto\" style=\"width: 80rem; margin:3px\">
            <div class=\"card-body\">
            <p class=\"card-text\">%s: %s</p>
            </div>
            </div>
            </div>", $username, $content);
        }
    } 
?>
</body>
</html>