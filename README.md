# :whale2:ErrorStocker
ErrorStockerとは、文字通りエラーを保存する為のアプリケーションです。『一度エラーが生じた際に、ネットから情報を探してきて解決に導く』この作業を短縮できればより多くのタスクをこなすことができると考えました。一度経験した、エラーや勉強した内容を一つの場所に集めておけば見直すことができるので、それを形にしたものです。

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


## :thought_balloon: 制作背景



## :open_file_folder:機能動作
:large_blue_diamond:投稿一覧画面です。一覧画面で内容を読み取れる仕様にしております。
[![Image from Gyazo](https://i.gyazo.com/679379037d4f87d0962c01682ea1ed71.png)](https://gyazo.com/679379037d4f87d0962c01682ea1ed71)

:large_blue_diamond:投稿の詳細画面です。左側には、誰が投稿したのかがわかるように表示をしております。中央には投稿した内容の詳細を表示し、いいね機能もわかりやすく表示しております。右側にコメントができる仕様をとっております。
[![Image from Gyazo](https://i.gyazo.com/8d820f2694e98e461c6f0a7f1105ada3.png)](https://gyazo.com/8d820f2694e98e461c6f0a7f1105ada3)

:large_blue_diamond:投稿の一覧画面で文字検索を行っています。一文字一文字が入力されるたびに検索される仕様にしております。
https://gyazo.com/4272d1578fac5a588d760afc0d428989

:large_blue_diamond:投稿の一覧画面でタグによって検索ができるようにしており、クリックするでけで表示を変えております。
https://gyazo.com/c17eda8d0775d9aea2ed4ca7d32c2119

:large_blue_diamond:行政相談のチャット画面です。行政側と町民側でアイコンを変えております。又、入力時間の表記もしておりますので、記録メモのミス等を回避することができます。
![Image from Gyazo](https://i.gyazo.com/292d05f5e4ea038981c1c8abf0f49ef2.jpg)

### スマホ対応画面一覧
|メッセージ一覧|投稿一覧|投稿詳細|
|---|---|---|
|![Image from Gyazo](https://i.gyazo.com/6aa29d8bf385138d2c4d9c52683d6b59.png)|![Image from Gyazo](https://i.gyazo.com/29b27833d09233fdd1d9f8c79b55c19e.png)|![Image from Gyazo](https://i.gyazo.com/9f07e4473dec68d682ae245593032480.png)|


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
- 投稿内容にマークダウンを採用

### コメント機能
- 投稿にコメントを投稿・編集・削除
- 投稿ページにコメント一覧表示
- コメント内容にマークダウンを採用


<br />

## :notebook:使用技術
### フロントエンド
- HTML / CSS / Bootstrap

### バックエンド
- PHP 8.0.2
- Laravel 6.0.3.4

### データベース
- Mysql 8.0  

### 開発環境
- Docker
- docker-compose

### 本番環境
- AWS(VPC、ALB、EC2、S3、Route53) 
- Nginx

<br />

## :closed_book:ER図
![Image from Gyazo](https://i.gyazo.com/ab5438d5405ef6e6fece172122a48ca6.png)


## :orange_book:インフラ図
![Image from Gyazo](https://i.gyazo.com/afbb6850269c97204b8b4a81db1a53dc.png)
