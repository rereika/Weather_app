# 地域を選択すると、天気がわかるサービス


## 誰のどんな課題を解決するのか？
雨がいつ降るかをすぐに知りたい、自転車通勤者や洗濯好きに愛用される天気アプリ。

## 機能要件
P0：必須<br>
P1：ここまで実装することを想定<br>
P2：可能であれば実装したい<br>


 **LP(トップページ)**
- 現在地の取得：Geolocation API を使用して緯度・経度を取得し、OpenWeatherMap API に送信(P0)
- 地名の入力：ユーザーが入力した地名を OpenWeatherMap APIに渡す(P0)
- Google Places APIを使用し、文字入力時、住所や地域名の候補をリアルタイムで表示 (P1)

 **天気情報の表示**
- 地域名、現在の天気、気温の表示(P0)
- 1時間ごとの天気(P0)
- いつから雨が降るか？一言コメント(P0)

## 使用する技術
- Geolocation API(現在地取得API)
- OpenWeatherMap API(天気取得API)
- Google Places API(知名候補を表示)

## テーブル定義書
取得した天気データはデータベースに保存し、同じ地域の情報が1時間以内に取得されている場合は、そのデータを再利用します（API呼び出しの効率化）。


### locations テーブル
| カラム名        | 意味                  | データ型 | PK   | FK   | NOT NULL | AUTO_INCREMENT | 制約 |
| :-------------- | :-------------------- | :------- | :--- | :--- | :------- | :---- | :------ |
| id              | 地域ID            | BIGINT   | ◯   |      |    ◯    | ◯ |         |
| name            | 地域名            | VARCHAR(255)   |      |      |   |       |    UNIQUE     |     |
| latitude | 緯度  | DOUBLE   |      |      | ◯       |       |         |
| longitude | 経度  | DOUBLE   |      |      | ◯       |       |         |
| created_at | 作成日時  | TIMESTAMP   |      |      | ◯       |       |  DEFAULT       |
| updated_at | 更新日時  | TIMESTAMP   |      |      | ◯       |       |  DEFAULT       |

### weather_data テーブル
| カラム名        | 意味                  | データ型 | PK   | FK   | NOT NULL | AUTO_INCREMENT | 制約 |
| :-------------- | :-------------------- | :------- | :--- | :--- | :------- | :---- | :------ |
| id              | 天気データID            | BIGINT   | ◯   |      |    ◯    | ◯ |         |
| location_id            | 地域ID            | BIGINT   |      |   ◯   | ◯  |       |        |     |
| current_weather | 現在の天気  | VARCHAR(50)   |      |      | ◯       |       |         |
| temperature | 気温  | DECIMAL(5, 2)   |      |      | ◯       |       |         |
| max_temperature | 最高気温  | DECIMAL(5, 2)   |      |      | ◯       |       |         |
| min_temperature | 最低気温  | DECIMAL(5, 2)   |      |      | ◯       |       |         |
| humidity | 湿度  | DECIMAL(5, 2)   |      |      | ◯       |       |         |
| sunrise_time | 日の出時間  | TIMESTAMP   |      |      | ◯       |       |         |
| sunset_time	 | 日の入り時間  | TIMESTAMP   |      |      | ◯       |       |         |
| fetched_at | 天気情報を取得した日時  | TIMESTAMP   |      |      | ◯       |       |  DEFAULT       |
| created_at | 作成日時  | TIMESTAMP   |      |      | ◯       |       |  DEFAULT       |
| updated_at | 更新日時  | TIMESTAMP   |      |      | ◯       |       |  DEFAULT       |
