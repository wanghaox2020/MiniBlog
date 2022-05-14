<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        section {
            /* margin-left: auto;
            margin-right: auto; */
            margin: auto;
            width: 80%;
        }
        h1 {
            margin: inherit;
            width: inherit;
            text-align: center;
            font-size: 30pt;
            }

        /* .form-inline {
            margin: 0;
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        } */
        form {
            display:flex;
            flex-direction:column;
            align-item: center;
            justify-conecnt: column;
        }

        p{ text-align: left;
            font-size: 15pt;
        }

        div{
            width: 100%;
        }

        button {
            width: 50%;
            margin: 10pt;
        }
        
    </style>  
</head>

<?php
    session_start();
    if(!isset($_SESSION["username"])){
        echo "<script>
            alert('Log in first');
            window.location.href='index.php';
            </script>";
    }
?>
<!--Section: insert question-->
<body>
    <section>
    <h1 class="text-center mb-8 pb-2 text-primary fw-bold">Post A new Question </h3>
        <p class="text-center mb-5">Please type your question</p>
        <form method="POST">
                <div class="mb-3 form-floating">
                    <label for="question-title" class="form-label">Question Title</label>
                    <input class = "form-control" type = "form-control" id = "questiontitle" name = "questiontitle" placeholder = "Please enter question title here">
                </div>
                <label for = "TagName"> Select a Question Tag: </label>
                    <select class = "form-select" name = "tagname" id = "tagname">
                        <?php
                            include "connectDB.php";
                            $selectTag = "select tag_name from Tag;";
                            $result = mysqli_query($conn, $selectTag);
                            while($row = $result->fetch_assoc()){
                                echo "<option>".$row['tag_name']."</option>";
                            }
                        ?>
                    </select>
                <br>
                <div class="mb-3 form-floating">
                    <label for="question-content" class="form-label">Enter your question below</label>
                    <textarea class="form-control" type = "form-control" id ="questionbody" name = "questionbody" style="height: 25rem;" placeholder = "Please enter your question here"></textarea>
                </div>

                
                <button style="position: absolute;bottom: 1rem;left: 19rem;" type = "submit" class="btn btn-primary"> submit </button>
        </form>
    </section>
</body>

<?php
    include 'connectDB.php';
    if(isset($_POST['questiontitle']) && isset($_POST['questionbody'])&& isset($_POST['tagname'])) {
        $username = $_SESSION['username'];
        $uid = $_SESSION['uid']; 
        $questiontitle = $_POST['questiontitle'];
        $questionbody = $_POST['questionbody'];
        $tagname = $_POST['tagname'];

        $select = "insert into Question (uid, tag, title, body)
                    values (?, (SELECT tag_id FROM Tag WHERE tag_name = ?), ?, ?)";

        $stmt = $conn->prepare($select);
        $stmt->bind_param('ssss', $uid, $tagname, $questiontitle, $questionbody);
        $stmt->execute();

        header("Location: home.php");
        echo '<script>alert("Insert Success!")</script>';
    }
?>
<!--Section: insert question-->
