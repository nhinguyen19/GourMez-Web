<link rel="stylesheet" href="them_tt.css">
<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>

<div id="container">
    <h2>Thêm tin tức</h2>

    <form action="submit_news.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <div id="imageDiv">
                        <div>
                            <b>Ảnh title</b>
                        </div>
                    </div>
                    <div class="upload-btn-wrapper">
                        <button class="btn">Thêm ảnh</button>
                        <input type="file" name="myfile" />
                    </div>

                </td>
                <td id="secondTd">
                    <div class="textbox">
                        <label for="title">Title</label> <br>
                        <input type="text" name="title" size="30" required><br><br>
                    </div>
                    <div class="textbox">
                        <label for="link">Link</label> <br>
                        <input type="url" name="link" size="30" required><br><br>
                    </div>

                    <button id="them" name="subject" type="submit" value="CSS">Thêm</button>
                   
                </td>
            </tr>

        </table>
    </form>
</div>