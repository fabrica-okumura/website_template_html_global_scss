グローバルCSSを使用してウェブサイト開発を始めるための基本となるHTML、CSS（SASS）、JavaScriptのファイルセットです。

ブラウザでの表示確認は、https://web-template-html-global-scss.onrender.com/ にアクセスしてください。
<br>

# ファイルの概要
- CSSはSASS（.scss）のDart Sass記法で記述しています。
- JavaScriptはjQueryなどのライブラリは使用していません。
- PHPで一部コンポーネントの読み込みをおこなっています。
<br>

# 環境設定
事前に開発環境へGit、Node.js、npm、Dockerアプリのインストールをおこなってください。
```bash
#ファイルをダウンロードする任意のディレクトリに移動
cd yourdirectory
#リポジトリをclone
git clone git@github.com:fabrica-okumura/website_template_html_global_scss.git
#cloneした作業ディレクトリに移動
cd yourrepository
#必要なパッケージをインストール
npm i
```
Dockerアプリを起動したのちDockerコンテナを起動します。
```bash
docker-compose up -d
```
http://localhost:8000/ にアクセスします。

`docker-compose down`でコンテナを停止できます。
<br>

# .scssファイルの編集とCSSのコンパイル
CSSのコンパイルはgulpを使用します。

新しいターミナルウィンドウを開き、作業ディレクトリでgulpタスクの実行を開始します。
```bash
npx gulp
```
ctrl + C でタスクを停止できます。
<br>

# CSS設計
グローバルCSSを使用する場合、それらを適切に管理しないとスタイルの競合や予期しない表示崩れなどが発生する可能性があるため、メンテナンス性や拡張性を意識したCSS設計が必要となります。ここでは[FLOCSS](https://github.com/hiloki/flocss)の設計手法を基本とし、独自のルールを追加して定義しています。
<br>

## レイヤーの定義
レイヤーの概念を用いて、スタイルの強度（特異性）とコードの影響範囲を制御します。上のレイヤーほど汎用的で広範囲に影響を与え、下のレイヤーほど具体的で限定的な影響を与えます。

セレクタには各レイヤーの頭文字をプレフィックスとして付与し、ファイルを分割して管理します。機能や目的ごとのモジュール単位でファイルを分割することによって、設定の追加・削除の管理を容易にするためです。

|レイヤー|プレフィックス|説明|例|
| ---- | ---- | ---- |---- |
|Global|なし| 変数やmixinなどグローバルで使用する定義。 |variable/mixin...|
|Foundation|なし|ブラウザのデフォルトスタイルの初期化や、プロジェクトの基本的なスタイルを定義。ページの全体の背景や基本的なタイポグラフィなど。|reset/normalize/base...|
|Layout|l-|ヘッダーやフッター、メインとなるコンテンツエリア、サイドカラムなどプロジェクト全体の共通レイアウト定義|header/main/side/footer...|
|Component|c-|再利用ができる最も小さなモジュールのスタイルを定義。グリッド、見出し、ボタン、ナビゲーション、ページネーション、カードなど。|grid/heading/button/card/media...|
|Project|p-|いくつかのComponentとElementで構成されるものを定義。記事一覧、ユーザープロフィール、画像ギャラリーなどのコンテンツを構成する要素のかたまりなど。|articles/ranking/promo...|
|Utility|u-|プロパティ単体での指定を補助するもの。単一の機能を持つヘルパーモジュールを定義。|margin/size/text...|
|Single|s-|ページ個別で使用されるスタイルのファイルを定義。|home.scss/about.scss/form.scss...|
|External|なし|swiperなどの外部ライブラリを使用しており、それらのCSSを上書きする必要がある場合のファイルを定義。externalディレクトリに各ファイルを格納する。|swiper_overrides.scss...|
<br>

## セレクタの命名規則
セレクタの命名規則については[MindBEMding](https://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/)を基本としていますが、BEMの特性上、セレクタ名が長くなり可読性が悪くなる傾向があるため、ルールを一部変更して定義しています。

コンポーネント（block）とその要素（element）をアンダースコア2つで繋ぎ、コンポーネントや要素の状態やバリエーション（modifier）をハイフン2つから始まるセレクタを追加することで表現します。

- .block {} … 親要素
- .block.--modifier {} … 親要素の状態やバリエーション
- .block__element {} … 子孫要素
- .block__element.--modifier {} … 子孫要素の状態やバリエーション

```scss
.c-btn {
  //ボタンコンポーネントの基本設定
  //以下、modifier設定
  &.--primary {

  }
  &.--secondary {

  }
  &.--danger {

  }
}
```

単語の区切りを表す場合はハイフン1つで表現します。
```scss
//ユーザープロフィールコンポーネントの例
.c-user-profile {
  
}
```

Utilityは親要素を持たないヘルパーモジュールであるため、サイズのバリエーションなどを表す場合はサイズを示すポストフィックスを付与します。

margin-bottomのUtilityクラスの例：u-mb_2xl,u-mb_xl,u-mb_lg,u-mb,u-mb_sm,u-mb_xs
<br>

### 要素の階層が深くなる場合
要素の階層が深くなる場合は、要素の階層をすべて__で繋げていくとセレクタ名が長くなってしまいます。例えばblock > element > subelementの構造を持つコンポーネントがある場合は、.block__element__subelementなどとせず、以下のようにフラットな構造にします。

```scss
.c-block {
  //ブロックの設定
  &__element {
    //子要素の設定
  }
  &__subelement {
    //孫要素の設定
  }
}
```

また可読性・メンテナンス性を考慮し、すべての子孫要素にセレクタ名を付けることはせず、要素セレクタを使用することとします。その場合は隣接セレクタ（+）や子セレクタ（>）などを利用し、セレクタの精度やスタイルの適用範囲を確実に制御するようにしてください。

```scss
.c-menu_block {
  > ul {
    // 子のulの設定
    li {
      a {
        // メニューリンクの設定
      }
    }
  }
}
```
<br>

### その他
- フォントサイズの単位はユーザーのフォント設定に対応するため相対的な値であるremまたはemを使用します。
- JavaScriptにより動的に変化する要素の状態を表すために、セレクタ名にis-プレフィックスを付与します。これにより特定の状態が適用されている要素を容易に特定でき、その要素がJavaScriptにより制御されていることが明確になります。

```scss
.c-btn {
  //ボタンの基本設定
  &.is-disabled {
    //非活性状態の設定
  }
}
```

- JavaScriptによる操作対象となる要素であることのみを表す場合は、セレクタ名にjs-プレフィックスを付与します。この場合はCSSの定義（見た目の定義）はおこなわないものとします。
- idセレクタは使用せずclassセレクタを利用します。これはidの詳細度（特異性）が非常に高く、意図せず他のスタイルを上書きする可能性があるためです。このルールによりコードの再利用性を保ちつつ、保守性を高め予期しないスタイリングの問題を防ぎます。
