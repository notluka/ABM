document.addEventListener('DOMContentLoaded', function() {
  fetch('data.php')
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      const papasData = {
        labels: labels,
        datasets: [
          {
            label: 'Cantidad de papas fritas vendidas',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: JSON.parse(data.papasData),
          },
        ],
      };

      const hamburguesasData = {
        labels: labels,
        datasets: [
          {
            label: 'Cantidad de hamburguesas vendidas',
            backgroundColor: 'rgb(54, 162, 235)',
            borderColor: 'rgb(54, 162, 235)',
            data: JSON.parse(data.hamburguesasData),
          },
        ],
      };

// ...

const panchosData = {
  labels: labels,
  datasets: [
    {
      label: 'Cantidad de panchos vendidos',
      backgroundColor: 'rgb(255, 205, 86)',
      borderColor: 'rgb(255, 205, 86)',
      data: JSON.parse(data.panchosData),
    },
  ],
};

// ...

const papasChart = new Chart(
  document.getElementById('papas-chart'),
  Object.assign({}, config, { data: papasData })
);

const hamburguesasChart = new Chart(
  document.getElementById('hamburguesas-chart'),
  Object.assign({}, config, { data: hamburguesasData })
);

const panchosChart = new Chart(
  document.getElementById('panchos-chart'),
  Object.assign({}, config, { data: panchosData })
);
});
