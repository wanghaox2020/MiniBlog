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
        echo "<script>
            alert('Log in first');
            window.location.href='index.php';
            </script>";
    }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"> 
        <?php
        printf("Question");
        ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>

  <?php
  printf("<a href=\"/home.php\" class=\"btn btn-info my-2 my-sm-0\" style=\"margin:3px;width: 125px;\">Back home</a>");
  ?>
</nav>
<?php
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
                    
                    <div style=\"display: inline-flex;float: right;\">
                        <p class=\"card-text\" style=\"margin: 5px;\" >%s</p> 
                        <p class=\"card-text\" style=\"margin: 5px;\" >%s</p> 
                    </div>
                    </div>
                </div>
            </div>", $title, $body, $username, $question_time);
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
                    <div style=\"display: inline-flex;float: right;\">
                    <button type=\"button\" class=\"btn btn-primary\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-hand-thumbs-up\" viewBox=\"0 0 16 16\">
                    <path d=\"M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z\"></path>
                    </svg>
                    Like
                    </button>
                    <p class=\"card-text\" style=\"margin: 5px;\" >%s</p> 
                    </div>
                    </div>
            </div>
            </div>
            </div>", $username, $content, $post_time);
        }
    }
    printf("<br>");
    printf("<br>");
    printf("<br>");
?>
    

<form method="POST"> 
    <div class="form-outline">
        <textarea class="form-control" id="textAreaExample" name="reply" style="width: 80rem;" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary"  style="height: 42px; width: 226px; position: absolute; right: 138px">
        Contribute a new answer!
    </button>
</form>

<?php
if (isset($_POST['reply'])){
    if (trim($_POST['reply']) == "" || empty($_POST['reply'])){
        echo '<script>alert("Reply cannot empty")</script>';
    }else{
        $message = $_POST['reply'];
        $qid = $_GET['qid'];
        $date = date('Y-m-d H:i:s');
        $like = 0;

        $select = "insert into Post (qid, uid, content, thumb_ups, post_time) values (?,?,?,?,?);";
        $stmt = $conn->prepare($select);
        $stmt->bind_param('iisis', $qid, $_SESSION['uid'], $message, $like, $date);
        $stmt->execute();
        header("Location: post.php?qid=$qid");
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