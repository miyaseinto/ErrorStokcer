# :exclamation:ErrorStocker
ErrorStockerとは、文字通りエラーを保存する為のアプリケーションです。『エラーが生じた際に、情報を探して解決に導く』この作業を短縮できればより多くのタスクをこなすことができると考えました。一度経験したエラーや勉強した内容等を一つの場所に集めておけば見直すことができるのでそれを形にしたものです。

<br />

## :globe_with_meridians: URL
URL: https://error-stocker.com

使用方法
閲覧用とログインして使用できる２パターンがあります。閲覧用は、閲覧Buttonをクリックすると使用できます。ただ、投稿することはできません。投稿する場合はログインしてからしかできません。投稿をする際は、タイトル・タグ（任意）・写真（任意）・内容を投稿することができます。内容を記述する際は、markdown記法で投稿できるようにしてます。

<br />

## :bust_in_silhouette: テストアカウント

|名　前|メールアドレス|パスワード|
|:----------:|:----------------:|:------------:|
|test|test@test.com|testtest|


<br />

## :thought_balloon: 制作背景
エラーが生じた際にリファレンスサイト・Qiita等から解決策を探して解決に導くこの流れで開発に励んでいました。しかし、一度エラーを解決した内容や勉強した内容等をGoogleのブックマークやQiitaでストックしておりましたが、どこにその情報を入れたかを



## :open_file_folder:機能動作

|新規投稿|投稿一覧|
|---|---|
|![Image from Gyazo](https://i.gyazo.com/b8dd6a7350770b9dba1144ca90415e06.png)|![Image from Gyazo](https://i.gyazo.com/949997d7f695203026d5510d031a7160.png)|

|投稿詳細|マイページ詳細|
|---|---|
|![Image from Gyazo](https://i.gyazo.com/dd4d4be0777cb65499f395c929ee4f79.png)|![Image from Gyazo](https://i.gyazo.com/a8bd6f944fff2a68d0a0fb0923435d08.png)|

|検索画面|コメント画面|
|---|---|
|![Image from Gyazo](https://i.gyazo.com/d44ba633c6f62d76e2c9318652e0a8bf.png)|![Image from Gyazo](https://i.gyazo.com/d68ce695f76e993b0f249d4e863e4423.png)|

### スマホ対応画面一覧
|投稿一覧|投稿詳細|検索画面|
|---|---|---|
|![Image from Gyazo](https://i.gyazo.com/76774a0a5f45a7b07600900c94cb6d56.png)|![Image from Gyazo](https://i.gyazo.com/6efacd3e624ba448dffc7b2af1025d0c.png)|![Image from Gyazo](https://i.gyazo.com/453e9f568452698271a6736d29723866.png)|


## :green_book:機能一覧

### ユーザー機能
- ユーザー登録（投稿用ログイン）
- ゲストログイン（閲覧用ログイン）
- マイページにて以下の投稿の一覧表示
  - 自分の投稿内容

### 投稿機能
- エラーのストックをログインアカウントが投稿・編集・削除
- 一覧表示、詳細表示
- 投稿一覧表示で10個の投稿数をページネーションを実施
- タグ付け（タグ検索）
- キーワード検索（タイトル・内容）
- 投稿内容にマークダウンを採用（cebe/markdown）

### コメント機能
- 投稿にコメントを投稿・編集・削除
- 投稿詳細ページにコメント一覧表示
- コメント内容にマークダウンを採用（cebe/markdown）



## :notebook:使用技術
### フロントエンド
- HTML / CSS / Bootstrap

### バックエンド
- PHP 8.0.2
- Laravel 8.28.1

### データベース
- Mysql 8.0  

### 開発環境
- Docker 20.10.2
- docker-compose 1.27.4

### 本番環境
- AWS(VPC、IAM、ALB、EC2、S3、Route53) 
- Nginx

<br />

## :closed_book:ER図
![Image from Gyazo](https://i.gyazo.com/1f0df171bea0f09482a0e037d8161c08.png)

## :orange_book:インフラ図
![Image from Gyazo](https://i.gyazo.com/9d944e0eed0fbc8f156a3bb486dd38f5.png)
