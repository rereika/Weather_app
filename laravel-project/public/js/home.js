// 天気情報を表示する
function updateWeatherDisplay(data) {
  const weatherDisplay = document.querySelector('.weather-display');
  if (data.error) {
    alert(data.error);
  } else {
    const sunrise = formatTime(data.sys.sunrise); // 日の出時間をフォーマット
    const sunset = formatTime(data.sys.sunset); // 日没時間をフォーマット
    const currentDate = getCurrentDate(); // 現在の日付を取得

    weatherDisplay.innerHTML = `
      <div class=date>
        <p class="weather-date">${currentDate}</p><p>${data.name}</p>
      </div>

      <div class=main>

        <div class="weather-info">
          <img src="http://openweathermap.org/img/w/${data.weather[0].icon}.png" alt="${data.weather[0].description}" />
          <div class="temp">
            <div class="main">
              <p class="main_temp">${data.main.temp}<span>°C</span></p>
            </div>
            <div class="min_max">
              <p class="temp_max">${data.main.temp_max}<span>°C</span></p>
              <p class="temp_min">${data.main.temp_min}<span>°C</span></p>
            </div>
          </div>
        </div>

        <div class="additional-info">
          <div class="one">
            <div class="pair">
              <p class="title">湿度<img src="${humidityImage}" alt="Humidity icon"></p>
              <p class="value"> ${data.main.humidity}%</p>
            </div>
            <div class="pair">
              <p class="title">日の出<img src="${sunriseImage}" alt="Sunrise icon"></p>
              <p class="value"> ${sunrise}</p>
            </div>
            <div class="pair">
              <p class="title">日没<img src="${sunsetImage}" alt="Sunset icon"></p>
              <p class="value">${sunset}</p>
            </div>
          </div>
        </div>


    </div>


      </div>
    `;
    weatherDisplay.classList.add('active');
  }
}


// UNIXタイムスタンプを時刻形式に変換する関数
function formatTime(timestamp) {
  const date = new Date(timestamp * 1000); // UNIXタイムスタンプをミリ秒に変換
  const hours = date.getHours().toString().padStart(2, '0');
  const minutes = date.getMinutes().toString().padStart(2, '0');
  return `${hours}:${minutes}`;
}

// 現在の日付をフォーマットする関数
function getCurrentDate() {
  const today = new Date();
  const year = today.getFullYear();
  const month = (today.getMonth() + 1).toString().padStart(2, '0'); // 月は0から始まるため+1
  const day = today.getDate().toString().padStart(2, '0');
  return `${year}-${month}-${day}`; // YYYY-MM-DD 形式で返す
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
