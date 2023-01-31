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

![スクリーンショット 2023-01-31 22 49 08](https://user-images.githubusercontent.com/109803113/215778068-3d9d5453-2fc3-412b-b4fd-a36871abd2c2.png)

- courses

![スクリーンショット 2023-01-31 22 50 39](https://user-images.githubusercontent.com/109803113/215778436-c5b63f2c-81be-4a84-8428-e09aecac4d7d.png)

- evaluations

![スクリーンショット 2023-01-31 22 51 25](https://user-images.githubusercontent.com/109803113/215778588-c96cc20f-1ac8-4350-b3d9-b573874c93ba.png)

- genres

![スクリーンショット 2023-01-06 13 38 21](https://user-images.githubusercontent.com/109803113/210931335-4104d396-0cdb-4aa7-bfeb-edf027c3e60c.png)

- likes

![スクリーンショット 2023-01-06 13 38 39](https://user-images.githubusercontent.com/109803113/210931363-9a6e3ab1-a475-49bc-b3c0-3a5957bfdeab.png)

- representatives

![スクリーンショット 2023-01-31 22 52 19](https://user-images.githubusercontent.com/109803113/215778885-0d579817-d215-43ef-854f-708a5903981e.png)

- shops

![スクリーンショット 2023-02-01 0 01 41](https://user-images.githubusercontent.com/109803113/215796446-f8f3a64c-47a7-4368-bfa7-e33ba32633fb.png)

- users

![スクリーンショット 2023-01-06 13 39 12](https://user-images.githubusercontent.com/109803113/210931400-ad254693-a84f-44ca-bccb-14c9ff4b0bf2.png)

## ER図
![rese dio](https://user-images.githubusercontent.com/109803113/215778932-af385e7a-1eb6-40cb-a4d5-4758d8f9b448.png)

## 環境構築
- Laravel 8.83.27
- PHP 8.1.10
- MySQL 5.7.34
