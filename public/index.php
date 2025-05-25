<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Peta Suara Anak</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #ffd6e8;
    }

    .header-container {
      background-color: #ffaec9;
      border-radius: 0 0 20px 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      padding: 10px 20px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: start;
      max-width: fit-content;
    }

    .logo {
      height: 50px;
      margin-right: 10px;
    }

    .logolagi {
      width: 200px;
      margin: 10px 0;
    }

    .header-container h1 {
      font-size: 20px;
      color: white;
      margin: 0;
    }

    .container {
      display: flex;
      justify-content: center;
      gap: 30px;
      padding: 40px 10px;
    }

    .panel {
      background-color: #ffaec9;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      padding: 2rem;
      text-align: center;
      width: 300px;
      min-height: 430px;
    }

    .panel h2 {
      color: #5a0f20;
      margin-bottom: 10px;
      font-size: 30px;
    }
    .panel p {
      color: #5a0f20;
      font-size: 19px;
      margin: 0 0 10px 0;
    }

    .main-content p {
      color: #5a0f20;
      font-size: 19px;
      margin: 0 0 10px 0;
    }

    .illustration {
      width: 300px;
      margin: 10px 0;
      margin-bottom: -10px;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
      width: 100%;
      max-width: 250px;
      margin: 0 auto;
    }

    .btn {
      padding: 12px;
      font-size: 1rem;
      border-radius: 10px;
      border: none;
      cursor: pointer;
    }

    .btn.login {
      background-color: #c7637d;
      color: white;
    }

    .btn.daftar {
      background-color: white;
      color: #c7637d;
    }

    .btn.bantuan {
      margin-top: 15px;
      background-color: #d4b4af;
      color: white;
    }

    .chart-canvas {
      width: 200px;
      height: 200px;
      margin: 0 auto 10px;
    }
  </style>
</head>
<body>
  <div class="header-container">
    <img src="../assets/logo.png" alt="Logo" class="logo" />
    <h1>PETA SUARA ANAK</h1>
  </div>

  <div class="container">
    <!-- Panel Forum -->
    <div class="panel">
        <h2>Forum</h2>
        <img src="../assets/logo.png" alt="logo" class="logolagi"/>
        <p>Diskusi & curhatan</p>
        <p>Sesama anak Indonesia</p>
    
        <ul style="list-style:none; padding-left:0; text-align:left; font-size:18px; color:#5a0f20; margin-top:15px;">
            <li>• Tips menghadapi bullying</li>
            <li>• Cerita pengalaman sekolah</li>
            <li>• Cara mengatasi stres</li>
            <li>• Hobi dan kegiatan seru</li>
        </ul>
    
        <button onclick="location.href='forum.php'" style="padding:16px 20px; border-radius:16px; background:#c7637d; color:#fff; border:none; cursor:pointer; margin-top:5px; font-size:16px">Masuk Forum</button>
    </div>


    <!-- Panel Login -->
    <div class="panel">
      <div class="main-content">
        <h2>Hallo Anak Hebat!!</h2>
        <p>Yuk curhat dan ceritakan<br>masalahmu bersama kami!!<br>Kami ada untuk mendengarmu</p>
        <img src="../assets/anak-hebat.png" alt="Anak Hebat" class="illustration" />
        <div class="button-container">
          <button class="btn login" onclick="location.href='login_anak.php'">Masuk/ Login</button>
          <button class="btn daftar" onclick="location.href='register.php'">Daftar</button>
        </div>
        <button class="btn bantuan" onclick="location.href='help.php'">Bantuan</button>
      </div>
    </div>

    <!-- Panel Insight -->
    <div class="panel">
      <h2>Insight</h2>
      <canvas id="insightChart" class="chart-canvas"></canvas>
      <p>Kategori laporan anak</p>
    </div>
  </div>

  <!-- Chart.js dan script fetch data -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    fetch('get_insight_data.php')  // Pastikan path ini sesuai lokasi file PHP
      .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
      })
      .then(data => {
        if (!data.length) throw new Error('Data kosong');
        
        const labels = data.map(item => item.jenis_masalah);
        const values = data.map(item => parseInt(item.jumlah));

        const ctx = document.getElementById('insightChart').getContext('2d');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: labels,
            datasets: [{
              label: 'Jumlah Laporan',
              data: values,
              backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#cc99ff', '#66ff99',
                '#ff9966', '#99ccff', '#ffcc99', '#c2f0c2', '#f0b3ff'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'bottom',
                labels: { color: '#5a0f20' }
              },
              tooltip: {
                callbacks: {
                  label: ctx => `${ctx.label}: ${ctx.raw}`
                }
              },
              title: {
                display: true,
                text: 'Kategori Masalah'
              }
            }
          }
        });
      })
      .catch(error => {
        console.error('Gagal mengambil data atau membuat chart:', error);
        // Bisa juga tampilkan pesan error di halaman
      });
  </script>
</body>
</html>
