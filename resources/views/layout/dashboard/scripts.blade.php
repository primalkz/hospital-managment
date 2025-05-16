<!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
  
  <!-- Custom JS -->
  <script>
    // Toggle Sidebar
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mainContent = document.getElementById('mainContent');
    const header = document.getElementById('header');
    
    toggleSidebar.addEventListener('click', function() {
      sidebar.classList.toggle('collapsed');
      mainContent.classList.toggle('expanded');
      header.classList.toggle('expanded');
      
      if (window.innerWidth < 992) {
        mobileOverlay.classList.toggle('active');
        mainContent.classList.toggle('expanded');
      }
    });
    
    mobileOverlay.addEventListener('click', function() {
      sidebar.classList.remove('collapsed');
      mobileOverlay.classList.remove('active');
    });
    
    // Department Chart
    const deptCtx = document.getElementById('deptChart').getContext('2d');
    const deptChart = new Chart(deptCtx, {
      type: 'doughnut',
      data: {
        labels: ['Cardiology', 'Neurology', 'Dermatology'],
        datasets: [{
          data: [60, 30, 10],
          backgroundColor: [
            '#4CAF50',
            '#FFC107',
            '#2196F3'
          ],
          borderWidth: 0,
          hoverOffset: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
    
    // Cases Chart
    const casesCtx = document.getElementById('casesChart').getContext('2d');
    const casesChart = new Chart(casesCtx, {
      type: 'line',
      data: {
        labels: ['', '', '', '', '', ''],
        datasets: [
          {
            label: 'Positive',
            data: [10, 15, 20, 25, 30, 35],
            borderColor: '#4285f4',
            backgroundColor: 'rgba(66, 133, 244, 0.1)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Negative',
            data: [5, 10, 15, 20, 25, 30],
            borderColor: '#fbbc05',
            backgroundColor: 'rgba(251, 188, 5, 0.1)',
            tension: 0.4,
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              display: true,
              drawBorder: false
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              display: false,
              drawBorder: false
            },
            ticks: {
              display: false
            }
          }
        },
        plugins: {
          legend: {
            display: false
          }
        },
        elements: {
          point: {
            radius: 0
          }
        }
      }
    });
  </script>