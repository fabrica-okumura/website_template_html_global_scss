<?php
$page="form";
?>
<?php include_once("parts/header.php"); ?>
<main class="u-cw_narrow">
  <p class="c-page_summary">ページサマリーページサマリーページサマリーページサマリーページサマリーページサマリーページサマリーページサマリーページサマリーページサマリーページサマリー</p>

  <form action="" method="POST">
    <div class="s-form u-mb_lg">
      <dl>
        <dt>会社名 <span class="c-input_status">必須</span></dt>
        <dd>
          <input type="text" name="" placeholder="例）株式会社ダミーカンパニー" maxlength="" value="" class="c-input is-error">
          <div class="c-input_error_text is-show">ここにエラー文。初期状態は非表示です。</div>
        </dd>
      </dl>
      <dl>
        <dt>部署名 <span class="c-input_status --optional">任意</span></dt>
        <dd>
          <input type="text" name="" placeholder="例）企画部" maxlength="" value="" class="c-input">
          <input type="text" name="" placeholder="disabled表示" maxlength="" value="" class="c-input" disabled>
        </dd>
      </dl>
      <dl>
        <dt>職種 <span class="c-input_status --optional">任意</span></dt>
        <dd>
          <select name="" id="" class="c-input">
            <option value="">-</option>
            <option value="">Webデザイナー</option>
            <option value="">プログラマー</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>ご担当者名 <span class="c-input_status is-ok">OK</span></dt>
        <dd>
          <input type="text" name="" placeholder="例）山田 太郎" maxlength="" value="" class="c-input is-ok">
          <div class="c-input_error_text">ここにエラー文</div>
        </dd>
      </dl>
      <dl>
        <dt>電話番号 <span class="c-input_status --optional">任意</span></dt>
        <dd>
          <input type="number" name="" placeholder="例）03xxxxxxxx" maxlength="" value="" class="c-input">
        </dd>
      </dl>
      <dl>
        <dt>メールアドレス <span class="c-input_status">必須</span></dt>
        <dd>
          <input type="email" name="" placeholder="例）dummy@dummy.com" maxlength="" value="" class="c-input">
          <div class="c-input_error_text">ここにエラー文</div>
        </dd>
      </dl>
      <dl>
        <dt>お問い合わせ種別 <span class="c-input_status">必須</span></dt>
        <dd>
          <label><input type="checkbox" class="c-checkbox"><span>チェックボックス1</span></label>
          <label><input type="checkbox" class="c-checkbox"><span>チェックボックス2</span></label>
          <div class="c-input_error_text">ここにエラー文</div>
        </dd>
      </dl>
      <dl>
        <dt>お問い合わせ種別 <span class="c-input_status">必須</span></dt>
        <dd>
          <ul class="s-form__btn_list">
            <li><label class="c-label_block"><input type="checkbox" class="c-checkbox"><span>資料が欲しい</span></label></li>
            <li><label class="c-label_block"><input type="checkbox" class="c-checkbox"><span>詳細説明を受けたい</span></label></li>
            <li><label class="c-label_block"><input type="checkbox" class="c-checkbox"><span>その他</span></label></li>
          </ul>
          <div class="c-input_error_text">ここにエラー文</div>
        </dd>
      </dl>
      <dl>
        <dt>お問い合わせ種別 <span class="c-input_status">必須</span></dt>
        <dd>
          <ul class="s-form__btn_list">
            <li><label class="c-label_block"><input type="radio" class="c-radio" name="dummy"><span>資料が欲しい</span></label></li>
            <li><label class="c-label_block"><input type="radio" class="c-radio" name="dummy"><span>詳細説明を受けたい</span></label></li>
            <li><label class="c-label_block"><input type="radio" class="c-radio" name="dummy"><span>その他</span></label></li>
          </ul>
          <div class="c-input_error_text">ここにエラー文</div>
        </dd>
      </dl>
      <dl>
        <dt>お問い合わせ内容 <span class="c-input_status --optional">任意</span></dt>
        <dd>
          <textarea name="" placeholder="お問い合わせ内容をご記入ください" maxlength="500" rows="5" class="c-input"></textarea>
          <textarea name="" placeholder="disabled表示" maxlength="500" rows="5" class="c-input" disabled></textarea>
        </dd>
      </dl>
      <dl>
        <dt>個人情報の取り扱いについて <span class="c-input_status">必須</span></dt>
        <dd>
          <p class="u-lh u-mb_xs">当社の<a href="" target="_blank" class="c-link_blank"><span>プライバシーポリシー</span></a>をお読みになり、同意した上で次のページにお進みください。</p>
          <p><label class="c-label_block"><input type="checkbox" class="c-checkbox"><span>個人情報の取り扱いに同意する</span></label></p>
          <div class="c-input_error_text">ここにエラー文</div>
        </dd>
      </dl>
    </div>
    <div class="s-form_btn_area">
      <button class="c-btn_primary">送信する</button>
    </div>
  </form>
</main>
<?php include_once("parts/footer.php"); ?>