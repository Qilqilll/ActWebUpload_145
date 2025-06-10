<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar File</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      margin: 0;
      padding: 40px 20px;
      background: linear-gradient(to right, #f8e8e8, #fdf3f3);
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #800000;
      margin-bottom: 30px;
      font-size: 24px;
    }

    .top-button {
      text-align: right;
      margin-bottom: 20px;
    }

    .top-button button {
      background-color: #800000;
      color: white;
      border: none;
      padding: 10px 18px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    .top-button button:hover {
      background-color: #a93226;
      transform: scale(1.05);
    }

    .file-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #fdfdfd;
      border: 1px solid #eee;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 15px;
      transition: box-shadow 0.2s;
    }

    .file-card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .file-info {
      display: flex;
      align-items: center;
      gap: 15px;
      flex: 1;
    }

    .file-info img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 6px;
    }

    .file-info .icon {
      font-size: 30px;
    }

    .file-info a {
      color: #333;
      text-decoration: none;
      font-weight: 500;
    }

    .file-info a:hover {
      text-decoration: underline;
    }

    .actions {
      display: flex;
      gap: 10px;
    }

    .btn {
      border: none;
      padding: 8px 14px;
      color: white;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    .btn.download {
      background-color: #16a34a;
    }

    .btn.download:hover {
      background-color: #15803d;
      transform: scale(1.05);
    }

    .btn.delete {
      background-color: #800000;
    }

    .btn.delete:hover {
      background-color: #a93226;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📁 Daftar File PDF/Gambar yang Telah Diunggah</h2>

    <div class="top-button">
      <a href="index.html">
        <button>⬆️ Upload Lagi</button>
      </a>
    </div>

    <?php
    $dir = "uploads/";
    if (!is_dir($dir)) {
        echo "<p>Folder <code>uploads/</code> tidak ditemukan!</p>";
        exit;
    }

    $files = array_diff(scandir($dir), array('.', '..'));
    if (empty($files)) {
        echo "<p>Tidak ada file yang diunggah.</p>";
    } else {
        foreach ($files as $file) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $icon = "";

            if (in_array($ext, ['png', 'jpg', 'jpeg'])) {
                $icon = "<img src='uploads/$file'>";
            } else {
                $icon = "<div class='icon'>📄</div>";
            }

            echo "
            <div class='file-card'>
              <div class='file-info'>
                $icon
                <a href='uploads/$file' target='_blank'>$file</a>
              </div>
              <div class='actions'>
                <a href='uploads/$file' download><button class='btn download'>Unduh</button></a>
                <a href='delete.php?file=$file'><button class='btn delete'>Hapus</button></a>
              </div>
            </div>";
        }
    }
    ?>
  </div>
</body>
</html>
