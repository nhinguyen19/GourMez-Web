<div>
    <h2>Thêm tin tức</h2>

    <form action="submit_news.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                   <div style="padding: 10px ; border : 3px solid;">
                            Ảnh title
                   </div>
                   <input type="file" name="uploadfile" id="img" style="display:block;"/>
                </td>
                <td>

                    <label for="title">Title</label> <br>
                    <input type="text" id="title" name="title" required><br><br>

                    <label for="link">Link</label> <br>
                    <input type="url" id="link" name="link" required><br><br>

                    <input type="submit" value="Thêm">

                </td>
            </tr>

        </table>
    </form>
</div>