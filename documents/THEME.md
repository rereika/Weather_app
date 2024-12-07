# 地域を選択すると、天気がわかるサービス


## 誰のどんな課題を解決するのか？
* 雨がいつ降るかをすぐに知りたい人、自転車通勤者、洗濯好き、せっかちな人々に愛用される天気アプリ。
* 地図上の地域を簡単に選択して、直感的に天気を確認できる利便性を提供。

## 機能要件
P0：ユーザー体験に必須<br>
P1：ここまで実装することを想定<br>
P2：可能であれば実装したい
- LP(トップページ)
    - 地図上の地域をクリックまたはタップして選択→「天気を見る」ボタンで遷移 (P0)
    - プレースホルダーに「地域名や住所を入力」し、「天気を見る」ボタンを押して検索 (P0)
    - 文字入力時、住所や地域名の候補をリアルタイムで表示 (P1)
    - 現在地取得ボタンで現在地の天気を確認 (P0)
- 天気情報の表示
    - 地域名、現在の天気、気温の表示(P0)
    - 1時間ごとの天気(P0)

## 使用する技術
### GoogleMapAPI
- 選定理由
1. データ精度が高い (世界中の詳細な地図データ)
2. 機能の多様性 (Autocomplete, 現在地取得など)
3. 開発の容易さ (豊富なドキュメントとサポート)
4. 多くのカスタマイズオプション

### 天気API

## 履歴管理の設計
### ログイン機能
* 実装しない理由<br>
天気を見るだけのためにログインを要求すると手間が増え、ユーザー体験を損ねるため。
* 代替案<br>
    - ユーザーごとの履歴はブラウザの **ローカルストレージ** に保存する。<br>
    - 履歴は最大5件を保持し、新しい履歴が追加されると古い履歴を削除。

### 履歴管理
検索履歴はローカルストレージに保存し、データベースには保存しない。
