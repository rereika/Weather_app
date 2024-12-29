// 天気情報を表示する
function updateWeatherDisplay(data) {
  const weatherDisplay = document.querySelector('.weather-display');
  if (data.error) {
    alert(data.error);
  } else {
    weatherDisplay.innerHTML = `
      <h2>天気情報</h2>
      <p>都市名: ${data.name}</p>
      <p>天気: ${data.weather[0].description}</p>
      <p>気温: ${data.main.temp}°C</p>
    `;
    weatherDisplay.classList.add('active');
  }
}

// 現在地ボタンをクリックしたとき
document.getElementById("current-location-btn").onclick = function () {

  // ロード画面を表示
  document.getElementById('page_loading').style.display = 'block';

  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
};

// 位置情報取得成功時
function successCallback(position) {
  let latitude = position.coords.latitude;
  let longitude = position.coords.longitude;

  document.getElementById("latitude").innerHTML = latitude;
  document.getElementById("longitude").innerHTML = longitude;

  // 現在地の天気情報を取得
  fetch(`/weather/current-location?latitude=${latitude}&longitude=${longitude}`)
    .then(response => response.json())
    .then(updateWeatherDisplay)
    .catch(error => alert("天気情報の取得に失敗しました"))
    .finally(() => {
      // ロード画面を非表示
      document.getElementById('page_loading').style.display = 'none';
    });
}

// 位置情報取得失敗時
function errorCallback(error) {
  alert("位置情報が取得できませんでした");
}

// 都市名検索フォーム送信時
document.querySelector('.weather-search form').addEventListener('submit', (event) => {
  event.preventDefault(); // ページリロードを防止

  let city = event.target.querySelector('input[name="city"]').value;

  // 都市名で天気情報を取得
  fetch(`/weather/search-city?city=${city}`)
    .then(response => response.json())
    .then(updateWeatherDisplay)
    .catch(error => alert("天気情報の取得に失敗しました"));
});
