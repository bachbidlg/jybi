<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 10:56
 */

/* @var $news frontend\models\News */

$default_language = $this->params['default_language'];
$this->title = Yii::t('frontend', $news->newsLanguage[$default_language]->name);
\Yii::$app->view->params['breadcrumbs'][] = $this->title;
?>
<section class="page-news-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="widget content">
                    <p>Lorem Ipsum là gì?</p>
                    <p>Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục
                        vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ
                        những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu
                        văn bản. Đoạn văn bản này không những đã tồn tại năm thế kỉ, mà khi được áp dụng vào tin học văn
                        phòng, nội dung của nó vẫn không hề bị thay đổi. Nó đã được phổ biến trong những năm 1960 nhờ
                        việc bán
                        những bản giấy Letraset in những đoạn Lorem Ipsum, và gần đây hơn, được sử dụng trong các ứng
                        dụng dàn trang, như Aldus PageMaker.</p>
                    <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img3.jpg')[1] ?>" alt="">
                    <p>Nó đến từ đâu?</p>
                    <p>Trái với quan điểm chung của số đông, Lorem Ipsum không phải chỉ là một đoạn văn bản ngẫu nhiên.
                        Người ta tìm thấy nguồn gốc của nó từ những tác phẩm văn học la-tinh cổ điển xuất hiện từ năm 45
                        trước Công Nguyên, nghĩa là nó đã có khoảng hơn 2000 tuổi. Một giáo sư của trường Hampden-Sydney
                        College (bang Virginia - Mỹ) quan tâm tới một trong những từ la-tinh khó hiểu nhất,
                        "consectetur", trích từ một đoạn của Lorem Ipsum, và đã nghiên cứu tất cả các ứng dụng của từ
                        này trong văn học cổ điển, để từ đó tìm ra nguồn gốc không thể chối cãi của Lorem Ipsum. Thật
                        ra, nó được tìm thấy trong các đoạn 1.10.32 và 1.10.33 của "De Finibus Bonorum et Malorum" (Đỉnh
                        tối thượng của Cái Tốt và Cái Xấu) viết bởi Cicero vào năm 45 trước Công Nguyên. Cuốn sách này
                        là một luận thuyết đạo lí rất phổ biến trong thời kì Phục Hưng. Dòng đầu tiên của Lorem Ipsum,
                        "Lorem ipsum dolor sit amet..." được trích từ một câu trong đoạn thứ 1.10.32.</p>
                    <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img2.jpg')[1] ?>" alt="">
                    <p>Trích đoạn chuẩn của Lorem Ipsum được sử dụng từ thế kỉ thứ 16 và được tái bản sau đó cho những
                        người quan tâm đến nó. Đoạn 1.10.32 và 1.10.33 trong cuốn "De Finibus Bonorum et Malorum" của
                        Cicero cũng được tái bản lại theo đúng cấu trúc gốc, kèm theo phiên bản tiếng Anh được dịch bởi
                        H. Rackham vào năm 1914.</p>
                    <p>Tại sao lại sử dụng nó?</p>
                    <p>Chúng ta vẫn biết rằng, làm việc với một đoạn văn bản dễ đọc và rõ nghĩa dễ gây rối trí và cản
                        trở việc tập trung vào yếu tố trình bày văn bản. Lorem Ipsum có ưu điểm hơn so với đoạn văn bản
                        chỉ gồm nội dung kiểu "Nội dung, nội dung, nội dung" là nó khiến văn bản giống thật hơn, bình
                        thường hơn. Nhiều phần mềm thiết kế giao diện web và dàn trang ngày nay đã sử dụng Lorem Ipsum
                        làm đoạn văn bản giả, và nếu bạn thử tìm các đoạn "Lorem ipsum" trên mạng thì sẽ khám phá ra
                        nhiều trang web hiện vẫn đang trong quá trình xây dựng. Có nhiều phiên bản khác nhau đã xuất
                        hiện, đôi khi do vô tình, nhiều khi do cố ý (xen thêm vào những câu hài hước hay thông tục).</p>


                    <div class="tags">
                        <span><i class="fa fa-tags"></i> Từ khóa:</span>
                        <a class="badge badge-dark" href="#">xây
                            nhà</a>
                        <a class="badge badge-dark" href="#">thiết
                            kế nhà</a>
                        <a class="badge badge-dark" href="#">biệt
                            thự</a>
                    </div>
                </div>

                <?php
                echo \frontend\widgets\NewsRelateWidget::widget(['news_id' => $news->id, 'limit' => 5]);
                ?>

                <div class="content widget comments">
                    <div class="sidebar-title">
                        <h4><?= Yii::t('frontend', 'Bình luận') ?></h4>
                        <div class="separator">
                            <div class="fb-comments"
                                 data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                                 data-numposts="5" data-width=""></div>
                        </div>
                    </div>
                    <div class="sidebar-content">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-right">
                    <?php
                    echo \frontend\widgets\ContactWidget::widget(['type' => 'contact_wg']);
                    echo \frontend\widgets\NewsFeatured::widget();
                    echo \frontend\widgets\NewsRecommendWidget::widget(['news_id' => $news->id, 'limit' => 5]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
