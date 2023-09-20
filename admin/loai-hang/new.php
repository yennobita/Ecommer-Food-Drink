<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <style>
        form {
            display: flex;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .btn{
            border-radius: 4px;
            border: 1px solid red;
            padding: 12px 24px;
            background-color: #000;
            color: white;
            text-decoration: none;
            
        }
    </style>
</head>

<body>
    <div class="row">
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="loai_hang">
            </div>
            <div class="form-group">
                <button type="submit" name="btn_insert" class="btn">Add</button>
            </div>
        </form>
    </div>
    <div class="row">
        <a href="?btn_list" class="btn">List</a>
    </div>
</body>

</html>