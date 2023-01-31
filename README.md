# Rese
飲食店予約サービス
![スクリーンショット 2023-01-06 13 42 02](https://user-images.githubusercontent.com/109803113/210931551-36cb39e8-8cdb-45d6-a6fe-b46bcc4a1fe0.png)
![スクリーンショット 2023-01-06 13 42 27](https://user-images.githubusercontent.com/109803113/210931557-27b44416-edb9-43cf-9361-dc72b72e6e73.png)

## 作成した目的
外部の飲食店予約サービスでは手数料を取られるため。

## 機能一覧
### 顧客向け
- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザーお気に入り一覧取得
- ユーザー予約一覧取得
- ユーザー予約履歴一覧取得
- 飲食店評価
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店評価一覧取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約追加
- 飲食店予約時決済
- 飲食店予約キャンセル
- 飲食店予約変更
- エリア検索
- ジャンル検索
- 店名検索
### 店舗責任者向け
- 店舗責任者登録
- 店舗情報登録
- 店舗情報変更
- 店舗予約一覧取得
- 予約客メール送信
- 予約リマインダー送信
- 予約内容QR読取

## 使用技術
- Laravel 8.x

## テーブル設計
- areas
![スクリーンショット 2023-01-06 13 36 51](https://user-images.githubusercontent.com/109803113/210931274-b6260dde-1fc1-4f45-be03-d45396172780.png)

- bookings
![スクリーンショット 2023-01-06 13 37 34](https://user-images.githubusercontent.com/109803113/210931309-8ccdf159-c2b6-4863-a2f7-07cb9a63f90f.png)

- genres
![スクリーンショット 2023-01-06 13 38 21](https://user-images.githubusercontent.com/109803113/210931335-4104d396-0cdb-4aa7-bfeb-edf027c3e60c.png)

- likes
![スクリーンショット 2023-01-06 13 38 39](https://user-images.githubusercontent.com/109803113/210931363-9a6e3ab1-a475-49bc-b3c0-3a5957bfdeab.png)

- shops
![スクリーンショット 2023-01-06 13 38 59](https://user-images.githubusercontent.com/109803113/210931382-24eb3f4a-03df-43ed-8de9-12343df6015c.png)

- users
![スクリーンショット 2023-01-06 13 39 12](https://user-images.githubusercontent.com/109803113/210931400-ad254693-a84f-44ca-bccb-14c9ff4b0bf2.png)

## ER図
![rese dio](https://user-images.githubusercontent.com/109803113/210930598-7b72c9c0-a418-45d5-b103-31db11be1909.png)

## 環境構築
- Laravel 8.83.27
- PHP 8.1.10
- MySQL 5.7.34
