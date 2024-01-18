const labels = ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"]

const data = {
  labels: labels,
  datasets: [
    {
      label: "My First Dataset",
      data: [11, 16, 7, 3, 14],
      backgroundColor: [
        "rgb(255, 99, 132)",
        "rgb(75, 192, 192)",
        "rgb(255, 205, 86)",
        "rgb(201, 203, 207)",
        "rgb(54, 162, 235)",
      ],
      // borderColor: 'rgb(255, 99, 132)',
      // hoverOffset: 4,
      data: [11, 16, 7, 3],
    },
  ],
};

const config = {
  type: "pie",
  data: data,
  options: {
    indexAxis: 'x',
    plugins:{
      legend: {
        display: true,
        position: 'top'
      },
      title: {
        display: true,
        text: 'Количество фильмов в каждой категории'
      }
    }
  },
};



const MyChart = new Chart(
  document.getElementById('myChart'),
  config
  );
