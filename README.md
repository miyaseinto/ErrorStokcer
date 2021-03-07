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



<br />
## :open_file_folder:機能動作

|投稿一覧|投稿の詳細画面|自身の投稿内容|
|---|---|---|
|[![Image from Gyazo](https://i.gyazo.com/679379037d4f87d0962c01682ea1ed71.png)](https://gyazo.com/679379037d4f87d0962c01682ea1ed71)|[![Image from Gyazo](https://i.gyazo.com/8d820f2694e98e461c6f0a7f1105ada3.png)](https://gyazo.com/8d820f2694e98e461c6f0a7f1105ada3)|![Image from Gyazo](https://i.gyazo.com/292d05f5e4ea038981c1c8abf0f49ef2.jpg)|


### スマホ対応画面一覧
|メッセージ一覧|投稿一覧|投稿詳細|
|---|---|---|
|![Image from Gyazo](https://i.gyazo.com/6aa29d8bf385138d2c4d9c52683d6b59.png)|![Image from Gyazo](https://i.gyazo.com/29b27833d09233fdd1d9f8c79b55c19e.png)|![Image from Gyazo](https://i.gyazo.com/9f07e4473dec68d682ae245593032480.png)|


<br />
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


<br />

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



## :orange_book:インフラ図

