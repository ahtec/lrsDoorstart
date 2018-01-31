<html>
<form enctype="multipart/form-data" action="storeUploadedFile.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="40000" />
    <!-- Name of input element determines name in $_FILES array -->
    Foto ophalen: <input name="userfile" type="file" />
    <input type="submit" value="Upload foto" />
</form>
</html>
