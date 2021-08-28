-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 05:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saj`
--

-- --------------------------------------------------------

--
-- Table structure for table `saj_articles`
--

CREATE TABLE `saj_articles` (
  `art_id` int(11) NOT NULL COMMENT 'Article Identification Number (ID)',
  `art_title` varchar(255) NOT NULL COMMENT 'Article Title',
  `art_inst` varchar(255) DEFAULT NULL COMMENT 'Author Institution Name ',
  `art_dept` varchar(255) DEFAULT NULL COMMENT 'Author Department Name',
  `art_author` varchar(100) NOT NULL COMMENT 'Article Author Name',
  `art_co_authors` varchar(260) DEFAULT NULL COMMENT 'Article Co-Authors Names',
  `art_abstract` text NOT NULL COMMENT 'Article Abstract',
  `art_uploader` varchar(255) DEFAULT NULL COMMENT 'Article Uploader Name',
  `art_upload_date` varchar(30) NOT NULL COMMENT 'Article Uploaded date',
  `art_issue` varchar(70) DEFAULT NULL,
  `art_upload_dir` varchar(500) NOT NULL COMMENT 'Article Uploaded File Directory',
  `art_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Status of the Article [ Unapproved = 0 , Approved  = 1 , Published = 2]',
  `art_cat_id` int(11) DEFAULT NULL COMMENT 'Article Category ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for keeping uploaded articles information';

--
-- Dumping data for table `saj_articles`
--

INSERT INTO `saj_articles` (`art_id`, `art_title`, `art_inst`, `art_dept`, `art_author`, `art_co_authors`, `art_abstract`, `art_uploader`, `art_upload_date`, `art_issue`, `art_upload_dir`, `art_status`, `art_cat_id`) VALUES
(1, 'استخدام الإنحدار اللوجستي الثنائي لتحديد أهم العوامل المؤثرة على الإصابة بمرض القلب خلال العام 2015م  &quot; دراسة حالة مركز السودان للقلب', NULL, NULL, 'أنور الزين بابكر مصطفي', 'عادل على أحمد ، مودة مجذوب حسين', 'تعتبر أمراض القلب من اكثر الأمراض شيوعا ومن اكثرها خطرا ، فقد يترتب عليها الكثير من المضاعفات التى تؤدي الى الوفاه . هدف البحث الى تحديد أهم العوامل التي تؤثر على الإصابة بأمراض القلب وبناء نموذج رياضي يمكن من التنبؤ باحتمالات الإصابة بامرض القلب ، اعتمد البحث  على بيانات أولية جمعت بواسطة استبانة تمتوزيعها على عينة حجمها 200 شخص ، استخدم البحث المنهج الوصفي حيث تم استخدام الجداول التكرارية ، والمنهج التحليلي في بناء نموذج الانحدار اللوجستي الثنائي ، تم  تحليل البيانات عن طريق برنامج الحزم الإحصائية للعلوم الاجتماعية (spss) ، ومن اهم النتائج التي أظهرها البحث ان نموذج الانحدار اللوجستي الثنائي الذي يوفق بيانات المتغيرات التي تؤثر على الإصابة بأمراض القلب له قدرة تفسيرية وتصنيفية عالية وبشكل دال إحصائيا ، إن اهم واكثر المتغيرات تأثيرا على الإصابة بأمراض القلب وذلك نسبة لتكرارظهور دلالتها الإحصائية في نماذج المجموعات الخمس ثم في النموذج العام هي ( العمر ، والوزن ، معدل الوزن الطبيعي ، التعرض للتدخين السلبي بصورة دائمة ، الإصابة بارتفاع ضغط الدم ، وجود مصابين بأمراض القلب في العائلة ، وجود مصابين بمرض السكر في العائلة ، وجود مصابين بمرض انخفاض نشاط الغدة الدرقية في العائلة ) ، وقد أوصى البحث الجهات المختصة بمكافحة مرض القلب باستخدام نموذج الانحدار اللوجستي الثنائي في عملية تصنيف المصابين من غير المصابين في المستقبل ، وأيضا اوصى بالاهتمام بصحة الجسم بصورة عامة والقلب بصورة خاصة  بالابتعاد عن العادات والأنظمة الضارة للجسم واتباع انظمة غذائية ورياضية مناسبة للحفاظ على سلامة الجسم والقلب.', NULL, 'Feb 2<sup>nd</sup> - 2017', '1', 'uploads/articles/published/58931d9af300e1.97630411.pdf', 2, 2),
(2, 'عوامل الرضا الوظيفي للعاملين بقطاع المصارف السودانية  ( دراسة حالة ولاية الجزيرة ،السودان 2016 م )', NULL, NULL, 'د.أبوسفيان محمد البشير', 'أ.عثمان محمود الأمين', 'هدفت الورقة إلي دراسة عوامل الرضا الوظيفي للعاملين بقطاع المصارف السودانية.تم استخدم المنهج الوصفي والتحليلي وتم جمع البيانات الأولية عن طريق الاستبيان، واستخلاص البيانات الثانوية من المصادر ذات الصلة ومن ثم تم استخدام برنامج الحزم الإحصائية للعلوم الاجتماعية(SPSS) لتحليل البيانات. وضحت نتائج الدراسة أن الأجور والمرتبات الممنوحة للعاملين بالمصارف السودانية والترقيات الوظيفية وبيئة العمل تحقيق الرضا الوظيفي للعاملين بالمصارف، بينما التدريب في المصارف لا يؤدي إلي تحقيق الرضا الوظيفي . أوصت الدراسة بالمحافظة علي نظم الترقي لاستدامة رضا العاملين و بتحسين بيئة العمل بشكل مستمر للمحافظة علي هذا المستوي من الرضا والمحافظة علي هيكل الأجور والمرتبات وتعديله وفقا للتغيرات في البيئة الخارجية كما أوصت بضرورة دراسة أسباب عدم رضا العاملين عن عملية التدريب واخيرا بإخضاع العاملين للمزيد من الدورات التدريبية لاكتساب الخبرات الجديدة وتطوير مقدراتهم الذاتية ورفع مستوي كفاءتهم.', NULL, 'Feb 2<sup>nd</sup> - 2017', '1', 'uploads/articles/published/58931edc757228.29758118.pdf', 2, 1),
(3, 'Prevalence of typhoid disease in South Darfur state- Sudan, from 2009 through 2013.', NULL, NULL, 'MOHAMMED ELMUJTBA ADAM ESSA', 'Sherihan Mohamed Elkundi Osman, Abdelkareem A. Ahmed', 'Descriptive analysis approach study aims to underline Typhoid disease in south Darfur community, Sudan, to inform policy-makers about fact status to put preventive plan and  interventions against typhoid, including vaccination\r\nThe DATA was collected  by FMOH of south Darfur state from January 2009 through December 2013, total number of reported cases are (5203 case) , include both the Inpatient and the outpatient cases, however mortality case excluded. Which are only reported in the Inpatient and they are 25 case, the data shows.', NULL, 'Feb 2<sup>nd</sup> - 2017', '1', 'uploads/articles/published/58931f457223d8.27898195.pdf', 2, 2),
(4, 'آراء السودانيون حول الحوار الوطني والمجتمعي في السودان 2016م', NULL, NULL, 'د عادل أحمد', 'د.مالك النعيم، د.المغيرة العوض، د.حبيب سليمان، أ.مناهل الصافي', 'معتمدة على منهج البحث المسحي تقدم هذه الورقة  آراء السودانين في ولاية الجزيرة حول الحوار الوطني والمجتمعي للعام 2016،. من خلال استطلاع  للرأي  تم تنفيذه في أبريل 2016م من قبل مركز السودان لاستطلاع الراي والدراسات الاحصائية (SPSC)، في هذا  المسح تم استطلاع آراء عينة ممثلة لمواطني ولاية الجزيرة  &ndash; السودان و طرح عدد من الأسئلة  تغطي المعرفة بالحوار الوطني  بما في ذلك المواقف والسلوكيات المتعلقة بوسائل الإعلام؛ والقيم والمواقف السياسية  ،  وقد أظهرت النتائج  إتفاق مواطني ولاية الجزيرة إلى سهولة التوافق بين المؤتمرين على قضايا السلام والحريات والهوية ولكنهم اتفقوا على صعوبة التوافق على قضايا الحكم كما تشارك مواطني الجزيرة  تخوفهم من إمكانية تنفيذ التوصيات المتعلقة بالحوار على أرض الواقع واتفقوا على اهمية الحوار في هذه المرحلة من تاريخ السودان.', NULL, 'Feb 2<sup>nd</sup> - 2017', '1', 'uploads/articles/published/58931fdb5d4027.03228815.pdf', 2, 1),
(5, 'Socio-economic and Demographic Factors Affecting the Incidence Sudanese Females with Breast Cancer.', NULL, NULL, 'Ahmed Saeed Rahma', 'Adel Ali Ahmed Mohamed', 'This Study aims at finding the socio-economic factors affecting incidence Sudanese females with breast cancer and testing the validity of some relations between patients and control group.The study depended on the data from database of Statistical Information and Resesrch Center at Radiation and Isotopes Center in Khartoum (RICK). The sample size of the study was (165) for each group patients and control. Variables measured on breast cancer patients tested by using chi-square test. The important results of the study are: the most significant factors affecting the incidence Sudanese female with breast cancer are: menopause status, breast feeding, first full term pregnancy, contraceptive use, benign breast biopsies, and body mass index. (20.6%) of women had breast cancer and their relatives also had a breast cancer, despite of the significant difference between the patients and control group according to the family history of breast cancer. (26.1)% and (22.4%) of patients and control group their age was more than 50 years, and (81.8%) of patients  their level of anxiety was normal and only( 3% ) of them are in high level of anxiety.\r\nThe study recommended that , early diagnosis and screening should be carried out, specifically targeted towards breast cancer.', NULL, 'Feb 2<sup>nd</sup> - 2017', '1', 'uploads/articles/published/5893204bcaaa07.09033039.pdf', 2, 2),
(6, 'العلاقة بين مناهج التعليم العالي وسوق العمل.', NULL, NULL, 'د. رؤى كمال حامد', '', 'تناولت الدراسة موضوع المناهج التعليمية في مؤسسات التعليم العالي ومدى توافقها مع متطلبات سوق العمل بالنسبة لخريجي الجامعات والمعاهد العليا من خلال توضيح متطلبات سوق العمل ومدى توفرها في مخرجات التعليم العالي وكيفية التخطيط التعليمي السليم لاعداد القوة العاملة التي تتلقى تعليما بمناهج تعليمية تطويرية وتاهيلية في المجالات الكاديمية والمهنية ، وركزت الدراسة بصورة خاصة على مناهج كلية تنمية المجتمع في جامعة شندي والتي اعدت مناهجها بهدف تنمية الطالب الجامعي وتاهيله لخدمة وتنمية المجتمع خاصة المجتمعات الريفية ،\r\nهدفت الدراسة الى التعرف على متطلبات سوق العمل ومتطلبات القوى العاملة الملائمة له وتوضيح دور كلية تنمية المجتمع في توفير عمالة مناسبة لسوق العمل في مجال التنمية الشاملة والخدمة الاجتماعية . واستندت الى منهجي دراسة الحالة وتحليل المحتوى من خلال عمل مقابلات نوعية منظمة مع الخريجين.\r\nتوصلت الدراسة الى عدد من النتائج بعد تحليل البيانات المتوفرة من اهمها ضعف العلاقة بين تخطيط التعليم العالي وسياساته واحتياجات سوق العمل. ساهم في ازدياد معدل بطالة مخرجات التعليم كما ان نسبة البطالة بين خريجو كلية تنمية المجتمع ضعيفة نسبيا بسبب الاعداد القليلة للطلاب المقبولين والخريجين كما ان مناهج الكلية تتوافق وبنسبة كبيرة مع متطلبات خدمة وتنمية المجتمعات.', NULL, 'Feb 2<sup>nd</sup> - 2017', '1', 'uploads/articles/published/5893208d1e7d04.43936088.pdf', 2, 4),
(7, 'دور بنك السودان المركزي في تعزيز ثقة الجهاز المصرفي في  طالبي التمويل الأصغر.', NULL, NULL, 'د. محمد عوض الكريم الحسين', 'أ. أبو ذر يوسف العوض', 'هدفت هذه الدراسة إلى معرفة الجهود المبذولة من قبل بنك السودان المركزي لتعزيز ثقة الجهاز المصرفي في طالبي التمويل الأصغر ومدي كفاية ونجاح تلك الجهود لتحقيق ذلك. أتخذ الباحث من أسلوب الاستبيان أداة لجمع بيانات المصارف, وأسلوب المقابلة لجمع معلومات من بنك السودان المركزي. تم عمل مسح شامل للجهاز المصرفي السوداني, أستخدم الباحث أسلوب التحليل الإحصائي البسيط لتحليل البيانات حيث تم الإعتماد على التكرارت والنسب, بعد تحليل البيانات التي تم جمعها توصلت الدراسة إلى عدد من النتائج, أن دور البنك المركزي في تعزيز ثقة الجهاز المصرفي في طالبي التمويل الأصغر هو تسهيل الضمانات, مراقبة المصارف, إنشاء وحدات التمويل الأصغر, وتشجيع المصارف  لمنح التمويل الأصغر, وكذلك الأسباب التي أدت إلى ضعف ثقة المصارف بعملاء التمويل الأصغر هي ضعف الوعي المصرفي لعملاء التمويل الأصغر, تدني خبرة عملاء التمويل الأصغر, وأيضاً من العوامل التي يضعها المصرف في الاعتبار عند منح التمويل الأصغر هي نوع المشروع, حجم المشروع, والموقف المالي للمشروع. من خلال النتائج المذكورة قدم الباحث بعض التوصيات أهمها تحسين العلاقة التعاونية بين المصارف وعملاء التمويل الأصغر بالذات من جانب المصارف لزيادة فرص الحصول على التمويل الأصغر وعلى البنك المركزي أن يلعب دور في تعزيز هذه العلاقة, توعية عملاء التمويل الأصغر بكيفية التعامل مع المصارف, يجب علي المصارف أن تنشاء فروع خاصة للتمويل الأصغر فقط وعلي الدولة أن تشجع ذلك, تمكين وحماية عملاء ومستهدفي التمويل الأصغر من مهددات استمرارية أعمالهم واستدامتها من خلال إدماج برامج التأمين ونظم التكافل الاجتماعي وتقديم الحوافز والتسهيلات التشجيعية من الدولة, الرقابة اللصيقة من قبل المصارف المانحة للتمويل الأصغر بالإضافة إلى التوجيهات حتى تتمكن مشاريع التمويل الأصغر من النجاح وبذلك يستطيع عميل التمويل الأصغر سداد مديونياته.', NULL, 'Feb 2<sup>nd</sup> - 2017', '1', 'uploads/articles/published/589320f3809184.64914595.pdf', 2, 1),
(8, 'الورش التدريبية الميكانيكية في الكليات التقنية في السودان  (دراسة تقويمية)', NULL, NULL, 'عبد الحفيظ إسحق محمد عبد الله', 'د. سعيد محمد محمد أحمد النوراني ، د. محيى الدين أحمد عبد القادر', 'هدفت الورقة إلي التعريف بالورش التدريبية الميكانيكية في الكليات التقنية في السودان،وتقويمها لمعرفة مدى مناسبتها في تحقيق الأهداف التعليمية،والكشف عن جوانب القوة والضعف فيها،والوقوف على مدى مواكبتها للتطورات العلمية والتكنولوجية.اتبعت الورقة المنهج الوصفي، واعتمدت على أداتي المقابلة للخبراء والاستبانة لأعضاء الهيئة التدريبية  مستخدمة برنامجSPSS في المعالجة الإحصائية، ووقفت في حدودها عند تخصصات الإنتاج والسيارات والتبريد والتكييف والميكاترونكس خلال الأعوام 2016-2014م. قسمت الورقة إلى مقدمة وأهداف ومنهجية ونتائج واستنتاجات وفق حالات التعليم التقني وأهدافه الراهنة في السودان ومن أهمها: (أهداف برنامج التدريب بالورش واضحة وتراعي التوازن مابين الجانبين النظري والتطبيقي وتحدد نتائج التعلم المتوقع من الخريج وتتفق نسبياً مع احتياجات سوق العمل- المحاور الأساسية للعملية التدريبية و طرائق التدريب(التدريس) والتقويم المستخدمة بالورش مناسبة و فاعلة تسهم بدرجة مقبولة في إعداد الطالب للعمل في مجال التخصص-الورش التدريبية الميكانيكية غير مواكبة للتطورات العلمية والتكنولوجية - تأرجح وضبابية تبعية التعليم التقني والكليات التقنية في السودان مابين وزارة التعليم العالي والبحث العلمي ووزارة تنمية الموارد البشرية وتعاقب الإدارات واختلاف الأسماء( هيئة التعليم التقني- الإدارة العامة-المجلس القومي للتعليم التقني والتقانى) يعد من أخطر وأكبر التحديات التنظيمية التي تواجه الورش التدريبية الميكانيكية في الكليات التقنية في السودان). أوصت الدراسة بالتالي:(إشراك سوق العمل في تقويم وتطوير برنامج التدريب بالورش- تخصيص ميزانية لتحديث البرامج التدريبية والمعدات والأجهزة والوسائل بالورش- وضع خطة لتدريب أعضاء الهيئة التدريبية (مدرسون، تقنيون،مدربون) بالورش.', NULL, 'Feb 2<sup>nd</sup> - 2017', '2', 'uploads/articles/published/58932187ad16e3.25323418.pdf', 2, 4),
(9, 'هجرة أساتذة الجامعات السودانيين للمملكة العربية السعودية: الأسباب والحلول', NULL, NULL, 'د. أحمد سعيد رحمه عبد الله', '', 'هدفت هذه الدراسة الي التعرف على أسباب هجرة الأساتذة السودانيين للمملكة العربية السعودية. تم استخدام المنهج الوصفي التحليلي في الدراسة، وتم تحليل البيانات عن طريق برنامج التحليل الاحصائي. (SPSS) شملت عينة الدراسة (104) من الأساتذة السودانيين اللذين يعملون في الجامعات السعودية. توصلت الدراسة لنتائج أهمها: أهم الأسباب الاقتصادية تمثلت في ضعف الرواتب بالجامعات السودانية، ارتفاع تكاليف المعيشة، زيادة تكاليف العلاج، تدهور العملة المحلية مقابل العملات الأجنبية، ارتفاع تكاليف المعيشة. أما أهم الأسباب الاكاديمية والعلمية كانت: ضعف تمويل البحث العلمي وعدم الاهتمام به، قلة الاهتمام بالنشر العلمي والتأليف. وكانت أهم الأسباب الاجتماعية المسؤولية الاجتماعية تجاه الأسرة الصغيرة والكبيرة، تلبية الطموح والرغبة في التطور. وأهم الأسباب الأخرى تمثلت في: الاستقرار الأمني والاقتصادي في السعودية، المحاباة والمجاملة في التعيين والترقي.قدمت الدراسة توصيات أهمها، معالجة الرواتب لأساتذة الجامعات وذلك بزيادتها الي مستوي يمكنهم من تلبية احتياجاتهم واحتياجات أسرهم مما يشجعهم على الاستقرار.', NULL, 'Feb 4<sup>th</sup> - 2017', '2', 'uploads/articles/published/5895b74eeb66c4.86757626.pdf', 2, 1),
(10, 'واقع الممارسة المهنية للخدمة الاجتماعية الطبية في المستشفيات السودانية من وجهة نظر الاختصاصيين الاجتماعيين', 'جامعة الخرطوم', 'قسم علم الاجتماع والانثربولوجيا', 'الطيب محجوب محمد أحمد', '', 'مستخلص الدراسة\r\nهدفت الدراسة التعرف على واقع ممارسة مهنة الخدمة الاجتماعية في المستشفيات السودانية الممارسة من وجهة نظر الاختصائيين الاجتماعيين،يتكون مجتمع الدراسة من جميع الاخصائيين الاجتماعيين العاملين في 16 مستشفى بولاية الخرطوم وبلغ عددهم 47 أخصائياً اجتماعياً.أستخدم الباحث المنهج الوصفي التحليلي،وقام باستخدام الاستبانة كأداة لجمع البيانات،وتم تحليل بيانات الدراسة باستخدام الحزم الاحصائية للبرامج الاجتماعية(spss)،وفقاً للأساليب الإحصائية التالية:التكرارات والنسب المئوية والمتوسطات الحسابية والإنحرافات المعيارية.أهم نتائج الدراسة إن أدوار الاختصاصيون الاجتماعيون في المستشفيات هي:إجراء عملية التحويل المناسبة لمؤسسات الدعم المالي المختلفة مثل ديوان الزكاة-مساعدة المرضى في حل مشاكلهم الاجتماعية-تقديم الدعم النفسي للمرضى المنومين بالمستشفى. وبينت إن أهم المعوقات التي تواجه الممارسة المهنية بالمستشفيات:الإفتقاد لأدارة مركزية مرجعية للمهنة على مستوى وزارة الصحة -ضعف تدريب الاخصائي الاجتماعي-ضعف نظم الحوافز والرواتب. وعلى ضوء النتائج قدمت الدراسة عدداً من التوصيات .', 'Eltayeb mohjoub mohamed ahmed', 'Wednesday, Feb 15th, 2017', NULL, 'uploads/articles/unapproved/58a41737856c40.55413989.doc', 0, NULL),
(11, 'السياسات الاجتماعية الوطنية ودورها في ممارسة الخدمة الاجتماعية الطبية في المستشفيات السودانية', 'جامعة  الخرطوم', 'قسم علم الاجتماع والانثربولوجيا', 'الطيب نحجوب محمد أحمد', '', 'مستخلص الدراسة\r\nهدفت الدراسة التعرف على الدور الذي تلعبه السياسات الاجتماعية الوطنية في ممارسة مهنة الخدمة الاجتماعية في المستشفيات السودانية من وجهة نظر الاختصائيين الاجتماعيين بالبحث في متغيرات:المعرفة والإدراك،علاقات العمل،الادوار المهنية المنفذة ،تكون مجتمع الدراسة من جميع الاختصائيين الاجتماعيين العاملين في 16 مستشفى بولاية الخرطوم وبلغ عددهم 47 أختصائياً اجتماعياً.أستخدم الباحث المنهج الوصفي التحليلي،وقام باستخدام الاستبانة كأداة لجمع البيانات،حُللت بيانات الدراسة باستخدام الحزم الاحصائية للبرامج الاجتماعية(spss).أهم نتائج الدراسة:أظهر الاختصاصيين الاجتماعيين بالمستشفيات مستويات متباينة من المعرفة بالسياسات والاجهزة الاجتماعية الوطنية المختلفة،ومثلت سياسات الرعاية الاجتماعية الوطنية للفقراء وما يرتبط بها من أجهزة أعلى مستويات المعرفة والعمل عند الاختصاصيون الاجتماعيون.وأوضحت الدراسة ضعف علاقات أقسام الخدمة الاجتماعية بالمؤسسات والاجهزة المنفذه لبقية السياسات الاجتماعية بصورة عامة،,وضعف تأثر ممارسة الأدوار للأختصاصي الاجتماعي بالمستشفيات السودانية بالسياسات الاجتماعية الوطنية. وعلى ضوء نتائجها قدمت الدراسة عدداً من التوصيات .', 'Eltayeb mohjoub mohamed ahmed', 'Wednesday, Feb 15th, 2017', NULL, 'uploads/articles/approved/58a418d30f9d13.56544603.doc', 1, NULL),
(12, 'قياس جودة الأداء لحرس الحدود باستخدام معيار Six Sigma', 'جامعة تبوك', 'قسم الاحصاء', 'د.عبدالله احمد الخليفة عبدالله', 'د.حسين يوسف عبدالله العضيم', 'إن الخطط المتبعة لمنع جرائم الحدود من تهريب وتسلل وغيرها من الجرائم لابد لها من تقييم من خلال المنجزات خلال فترة زمنية محددة والذي يقاس عادة بعدد من الوسائل التي تختلف من منطقة لأخرى ،  فعدد العمليات التي تمت خلال فترة محددة هي المحور الأساسي في عملية تقييم الجودة لأداء الوحدة المعينة ، فالمشكلة تتلخص في أن الأسلوب المستخدم لقياس هذه الجودة في اغلب الأحيان يعتمد على تحليل النسب والمتوسطات وهى مؤشرات ليست كافية بالقدر الذي يمكن من بناء خطط مستقبلية  ، إذ ليس هنالك أسلوب قياس حديث مستخدم لقياس هذه الجودة.      \r\n      يهدف هذا البحث لعرض كيفية الاستفادة من معيار Six Sigma لقياس جودة الوحدة العاملة لحرس الحدود في منطقة معينة أو على مستوى الدولة. وهو احد المعايير المعروفة في عالم إدارة الجودة ، وتتلخص فكرته في تقليل عدد العيوب في المنتج حيث أنه يسمح  فقط بـ 3.4 عيب لكل مليون فرصة أي أن نسبة الكفاءة والفاعلية  99.9997% . وسيتم تطبيق هذا المعيار على العمليات التي تمت خلال فترة محددة ، على أساس أن العمليات التي تم الكشف عنها مؤخرا تمثل العيوب في المعيار.\r\nتأتي أهمية هذه الدراسة من أنها تحدد مستوى الجودة التي تعمل به الوحدة العاملة لحرس الحدود في منطقة معينة ومن ثم يمكن بناء الخطط وتعديلها وفقاً لهذا المستوى وكذلك يمكن المقارنة بين أداء الوحدات المختلفة أو المقارنة بين أداء نفس الوحدة لفترات متباينة إضافة لقياس الجودة لحرس الحدود على مستوى البلد. \r\nوقد خلصت الورقة لنتائج من أهمها أهمية استخدام منهجية six sigma  في تطوير الأداء لحرس الحدود بصورة عامة وبصورة خاصة لحالة الدراسة فقد تبين أن جودة  الأداء العام لحرس الحدود بالدولة X  ضعيف يحتاج إلى معالجة, وأن الأداء لحرس الحدود بالدولة X كان أفضل في الربع الأخير من العام و أسوأ أداء كان في الربع الثالث من العام.وعلى مستوى الجرائم كان أفضل مستوى أداء لمكافحة التهريب من الخارج للداخل وأسوأ أداء في مكافحة التسلل من الخارج للداخل.', 'elmogiera', 'Sunday, Feb 26th, 2017', NULL, 'uploads/articles/unapproved/58b2a29d9e4d46.37089027.doc', 0, NULL),
(13, 'السياسات الاجتماعية الوطنية ودورها في ممارسة الخدمة الاجتماعية الطبية  بالمستشفيات السودانية', NULL, NULL, 'الطيب محجوب محمد أحمد', '', 'هدفت الدراسة التعرف على الدور الذي تلعبه السياسات الاجتماعية الوطنية في ممارسة مهنة الخدمة الاجتماعية في المستشفيات السودانية من وجهة نظر الاختصائيين الاجتماعيين بالبحث في متغيرات:المعرفة والإدراك،علاقات العمل،الادوار المهنية المنفذة ،تكون مجتمع الدراسة من جميع الاختصائيين الاجتماعيين العاملين في 16 مستشفى بولاية الخرطوم وبلغ عددهم 47 أختصائياً اجتماعياً.أستخدم الباحث المنهج الوصفي التحليلي،وقام باستخدام الاستبانة كأداة لجمع البيانات،حُللت بيانات الدراسة باستخدام الحزم الاحصائية للبرامج الاجتماعية(spss).أهم نتائج الدراسة:أظهر الاختصاصيين الاجتماعيين بالمستشفيات مستويات متباينة من المعرفة بالسياسات والاجهزة الاجتماعية الوطنية المختلفة،ومثلت سياسات الرعاية الاجتماعية الوطنية للفقراء وما يرتبط بها من أجهزة أعلى مستويات المعرفة والعمل عند الاختصاصيون الاجتماعيون.وأوضحت الدراسة ضعف علاقات أقسام الخدمة الاجتماعية بالمؤسسات والاجهزة المنفذه لبقية السياسات الاجتماعية بصورة عامة،,وضعف تأثر ممارسة الأدوار للأختصاصي الاجتماعي بالمستشفيات السودانية بالسياسات الاجتماعية الوطنية. وعلى ضوء نتائجها قدمت الدراسة عدداً من التوصيات .\r\nالكلمات الدالة : الرعاية الاجتماعية- المؤسسات الاجتماعية - الفقر', NULL, 'Feb 28<sup>th</sup> - 2017', '1', 'uploads/articles/published/58b51235c552c8.33579091.pdf', 2, 1),
(14, 'تقويم الفاقد قبل وبعد الحصاد لبعض محاصيل الخضر في دولة قطر', 'جامعة الجزيرة', 'قسم الاقتصاد الزراعي', 'د. محمد السر احمد عواض', 'بروف. نجاة احمد الملثم ، بروف. عباس فتحي العوضي، د. رجاء  حسن مصطفى', 'على الرغم من ان مشكلة الفاقد في السلع الزراعية  مشكلة عالمية إلا إنها تبرز بشكل واضح في الدول التي يتصف قطاعها الزراعي بانه قطاع نامي ومن ضمنها دولة قطر ، ويرجع السبب في ذلك لعدم توافر الوسائل الفنية التي يمكن من خلالها تقليل هذا الفاقد إلي حده الأدنى ، بالإضافة الى عدم توافر المعلومات الكافية لتوصيف الفاقد من السلع الزراعية واسبابه ، بما يمكن من اتخاذ التدابير اللازمة للحد منه. يهدف هذا البحث إلى دراسة وتحليل وتقدير خسائر الفاقد في مراحل عمليات الإنتاج والتسويق لأهم للخضروات المنتجة محليا (الطماطم،الخيار والكوسا) إضافة إلى تحليل و تقدير الخسائر في إنتاج التمور وتسويقها و ذلك في دولة قطر خلال الفترة 2013-2015. اعتمدت منهجية الدراسة على أسلوب التحليل الوصفي والكمي. استخدمت الدراسة كل من البيانات الأولية والثانوية. تم جمع البيانات الأولية من خلال استبيانات تم توزيعها على المزارعين والوسطاء في كل مرحلة من مراحل عملية التسويق و قد تم جمع البيانات الثانوية من مصادر ذات صلة بموضوع البحث. تم استخدام برنامج SPSS  لتحليل معادلة الانحدار المتعدد لمعرفة اثر المتغيرات المختلفة على الفاقد الزراعي. كما تم استخدامه في تحليل التباين و T-Test لمعرفة اثر المتغيرات المختلفة على الفاقد الزراعي. توصلت نتائج الدراسة الى ان اجمالي قيمة الفاقد على المستوى القومي لمحاصيل الخضر يبلغ نحو 6 ، 6.1 ، 3.9  مليون ريال / سنوياً لكل من محاصيل الطماطم ، الخيار و الكوسا على الترتيب ، وينقسم هذا الفاقد الى فاقد انتاجي وتسويقي، تنحصر أهم اسباب الفاقد الانتاجي في قلة العمالة الماهرة، عدم الاهتمام بمقاومة الامراض والآفات ، عوامل مناخية غير مواتية ، وضعف دور الارشاد الزراعي ، في حين ان أهم اسباب الفاقد التسويقي تمثلت في سوء نوعية العبوات، ضعف خبرة العمالة بعمليات ما بعد الحصاد ، عدم الاهتمام بالعمليات التسويقية ، وعدم تنظيم السوق المركزي و كانت اهم توصيات الدراسة  هي العمل على زيادة الجهود المبذولة من قسم الوقاية بإدارة الشؤون الزراعية (وزارة البلدية والبيئة) لمكافحة الاصابات الحشرية والفطرية وضرورة الاهتمام بتوفير مبيدات فعالة وامنة لمحاصيل الخضر ، توعية المزارعين بالعمليات الزراعية خاصة عمليات ما بعد الحصاد، من خلال تنظيم دورات وندوات ارشادية متخصصة لمحاصيل الخضر ، ضرورة ارشاد اصحاب المزارع بأهمية تجهيز مُنْشَآة مظللة لإجراء عمليات الفرز والتدريج بعد الانتهاء من عمليات الجمع، تشجيع الزراعات المحمية لإنتاج محاصيل الخضروات .', 'meawaad@mme.gov.qa', 'Wednesday, Mar 15th, 2017', NULL, 'uploads/articles/unapproved/58c8cbc324d527.25506222.docx', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saj_categories`
--

CREATE TABLE `saj_categories` (
  `cat_id` int(11) NOT NULL COMMENT 'Category Identification Number',
  `cat_name` varchar(255) NOT NULL COMMENT 'Category Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for Keeping Categories Information';

--
-- Dumping data for table `saj_categories`
--

INSERT INTO `saj_categories` (`cat_id`, `cat_name`) VALUES
(1, 'Social Science'),
(2, 'Health'),
(3, 'Political Science'),
(4, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `saj_editors`
--

CREATE TABLE `saj_editors` (
  `editor_id` int(11) NOT NULL COMMENT 'The Editor Identification Number',
  `editor_name` varchar(250) NOT NULL COMMENT 'The Editor Name',
  `editor_details` varchar(255) DEFAULT NULL COMMENT 'The Editor Details (Description)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for Keeping Editorial Board Members';

--
-- Dumping data for table `saj_editors`
--

INSERT INTO `saj_editors` (`editor_id`, `editor_name`, `editor_details`) VALUES
(1, 'Ahmed Hamad Nori', 'Professor'),
(2, 'Dr. Elmogiera Elawad', 'Manager Editor'),
(3, 'Dr. Adel Ali Ahmed', 'Chief Editor');

-- --------------------------------------------------------

--
-- Table structure for table `saj_events`
--

CREATE TABLE `saj_events` (
  `event_id` int(11) NOT NULL COMMENT 'The Event Identification Number',
  `event_title` varchar(255) NOT NULL COMMENT 'The Event Title (Heading)',
  `event_details` text NOT NULL COMMENT 'The Event Details (Description)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for Keeping the Journal Events';

--
-- Dumping data for table `saj_events`
--

INSERT INTO `saj_events` (`event_id`, `event_title`, `event_details`) VALUES
(1, 'الان نستقبل الأوارق العلمية', 'الان نستقبل الأوارق العلمية ليتم نشرها في المجلة، التسجيل مفتوح للجميع، وسيتم مراجعة الأبحاث من قبل محررين ذوي خبرة عملية طويلة في مجال الأبحاث'),
(2, 'Now we receiving articles', 'Now we do receive the researches, Thus Registration is Opened for everyone to register and submit his or her research, and the submitted article is going to be reviewed by a group of experienced editors that have long practical experience in their fields.'),
(3, 'الإصدارة الاولى ، ديسمبر 2016', 'تم إصدار النسخة الأولى من المجلة لعام 2016 في شهر ديسمبر..\r\nالمقالات متاحة للقراءة والتنزيل.'),
(17, 'نستقبل الاوراق الخاصة باصدارة  يونيو 2019 المجلد الخامس', 'نستقبل الاوراق الخاصة باصدارة  يونيو 2019 المجلد الخامس');

-- --------------------------------------------------------

--
-- Table structure for table `saj_issues`
--

CREATE TABLE `saj_issues` (
  `issue_id` int(11) NOT NULL COMMENT 'The Issue Identification Number ',
  `issue_title` varchar(255) NOT NULL COMMENT 'The Issue Title',
  `issue_has_arts` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'This Column to Determine Whether This Issue Has Published Articles Within it or Not [Has = 1, Doesn''t Have = 0]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for Keeping issues information';

--
-- Dumping data for table `saj_issues`
--

INSERT INTO `saj_issues` (`issue_id`, `issue_title`, `issue_has_arts`) VALUES
(1, 'December 2016', 1),
(2, 'January 2017', 1),
(3, 'February 2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saj_members`
--

CREATE TABLE `saj_members` (
  `mem_id` int(11) NOT NULL COMMENT 'Member Identification Number (ID)',
  `mem_uname` varchar(100) NOT NULL COMMENT 'Member Login Name',
  `mem_pword` varchar(150) NOT NULL COMMENT 'Member Password',
  `mem_email` varchar(255) NOT NULL COMMENT 'Member Email',
  `mem_phone` varchar(20) NOT NULL COMMENT 'Member Phone Number',
  `mem_group` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Member Group [User = 0, Editor = 1, Admin = 2]',
  `mem_status` tinyint(1) DEFAULT 0 COMMENT 'Member Status [Not Activated = 0, Activated = 1]',
  `mem_hash` varchar(55) DEFAULT NULL COMMENT 'When member is newly registered hash will be sent to the given email and status = 0, and when they activate it the status = 1, hash = 0, and member can''t reset password unless status = 1 and hash = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for keeping Members Information';

--
-- Dumping data for table `saj_members`
--

INSERT INTO `saj_members` (`mem_id`, `mem_uname`, `mem_pword`, `mem_email`, `mem_phone`, `mem_group`, `mem_status`, `mem_hash`) VALUES
(1, 'admin', 'abea1cef46b749a5204be39627a3503d1c2fdb7f', 'Mr.hamood277@gmail.com', '+974 12345678', 2, 1, '0'),
(2, 's', '825a03fd0a8d189094a948704bfdfc4670be9b68', 'zweqf@sdfg.j', '+249 4', 0, 0, 'af53d4aa0b9131f18f84130767ee5b1dcbcb63be');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saj_articles`
--
ALTER TABLE `saj_articles`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `saj_categories`
--
ALTER TABLE `saj_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `saj_editors`
--
ALTER TABLE `saj_editors`
  ADD PRIMARY KEY (`editor_id`);

--
-- Indexes for table `saj_events`
--
ALTER TABLE `saj_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `saj_issues`
--
ALTER TABLE `saj_issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `saj_members`
--
ALTER TABLE `saj_members`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `mem_email` (`mem_email`),
  ADD UNIQUE KEY `mem_uname` (`mem_uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saj_articles`
--
ALTER TABLE `saj_articles`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Article Identification Number (ID)', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `saj_categories`
--
ALTER TABLE `saj_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Category Identification Number', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saj_editors`
--
ALTER TABLE `saj_editors`
  MODIFY `editor_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The Editor Identification Number', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saj_events`
--
ALTER TABLE `saj_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The Event Identification Number', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `saj_issues`
--
ALTER TABLE `saj_issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The Issue Identification Number ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saj_members`
--
ALTER TABLE `saj_members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Member Identification Number (ID)', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
