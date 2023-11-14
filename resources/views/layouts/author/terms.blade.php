<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth scroll-p-40"
>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <title>UniRead</title>
        @vite(['resources/css/app.css','resources/js/app.js', 'resources/js/tabs.js'])
        <script src="../../js/app.js"></script>
    </head>
    <body>
        @include('partials.nav')
        
            <section class="flex flex-col items-center w-full">
                <div class="flex w-full justify-evenly">
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button active" data-tab="#terms-and-conditions">Terms &amp; Conditions</button>
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button" data-tab="#privacy-policy">Privacy Policy</button>
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button" data-tab="#content-guidelines">Content Guidelines</button>
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button" data-tab="#tags">FAQ/FAQS</button>
                </div>
            </section>
                <main class="flex w-full">
                    <div class="tab-content w-full flex" id="terms-and-conditions">
                        <aside id="default-sidebar" class="h-auto transition-transform min-w-[30vw]" aria-label="Sidebar">
                            <div class="container flex p-5">
                                <div class="h-full relative">
                                    <ul class="space-y-2 font-medium">
                                        <li class="flex justify-start p-2 my-3 border-l-4 border-solid items">
                                            <a href="#acceptance-of-terms" class="ml-5 font-sans text-2xl text-black">Acceptance of Terms</a>
                                        </li>
                                        <li class="flex justify-start p-2 my-3 border-l-4 border-solid items">
                                            <a href="#user-responsibility" class="ml-5 font-sans text-2xl text-black">User Responsibility</a>
                                        </li>
                                        <li class="flex justify-start p-2 my-3 border-l-4 border-solid items">
                                            <a href="#user-content" class="ml-5 font-sans text-2xl text-black">User Content</a>
                                        </li>
                                    </ul>
                                </div>   
                            </div>
                        </aside>
                        <article class="bg-gray-200 text-justify shadow-lg font-sans shadow-gray-200 text-gray-600 p-10 w-full rounded-lg mr-5">
                            <h2 class="text-2xl text-gray-900 mb-2 font-semibold " id="acceptance-of-terms">Acceptance of Terms</h2>
                            <ul class="space-y-3 my-5 text-gray-500 list-disc list-inside w-full dark:text-gray-400 ">
                                <li class='text-xl'>
                                    By using the UniRead, you agree to be bound by the following Terms and Conditions. 
                                    If you do not agree to these terms, please do not use the Website.
                                </li>
                            </ul>
                            <h2 class="text-2xl my-5 text-gray-900 mb-2 font-semibold " id="user-responsibility">User Reponsibility</h2>
                            <ul class=" text-gray-500 list-disc list-inside w-full dark:text-gray-400 space-y-3">
                                <li class='text-xl'>
                                    You must be at least 18 years old to use the Website. Children ("TEENS") under 
                                    the age of 18 are not permitted to use UNIREAD. Children are not permitted to utilize 
                                    our services in any way. If UNIREAD knows a user or visitor is less than 18 years old, 
                                    UNIREAD will never knowingly request or accept that user's personally identifiable 
                                    information or any other content. If UNIREAD learns that a user or visitor under the 
                                    age 18 of has registered for an account or uploaded personally identifiable information 
                                    or other content to the Services, it will terminate the account and delete the data or 
                                    content.
                                </li>
                                <li class="text-xl ">
                                    You are responsible for maintaining the confidentiality of your account and password.
                                </li>
                                <li class="text-xl ">                
                                    You agree to use the Website only for lawful purposes and in a manner consistent with all applicable laws and regulations.
                                </li>
                            </ul>
                            <h2 class="text-2xl my-5 text-gray-900 mb-2 font-semibold " id="user-content">User Content</h2>
                            <ul class=" text-gray-500 list-disc list-inside w-full dark:text-gray-400 space-y-3">
                                <li class='text-xl'>
                                    You are solely responsible for the content you upload, post, or share on the Website
                                </li>
                                <li class="text-xl">
                                    You must not upload, post, or share any content that infringes on the intellectual property rights of others or violates any applicable laws.
                                </li>
                                <li class="text-xl">                
                                    All material submitted by users will remain their own. It is your duty to check for any potential trademark or copyright infringement before posting anything online. 
                                </li>
                            </ul>
                        </article>
                    </div>
                    <div class="hidden tab-content my-5 px-20 min-h-[40vh] w-screen flex-col flex items-center" id="privacy-policy">
                        <article class="bg-gray-200 text-justify shadow-lg font-sans shadow-gray-200 text-gray-600 p-10 w-full rounded-lg mr-5">
                            <h2 class="text-2xl text-gray-900 mb-2 font-semibold ">UniRead Privacy Policy</h2>
                            <ul class="space-y-6 my-5 text-gray-500 w-full dark:text-gray-400">
                                <li class='text-xl'>
                                    UniRead Platform provides privacy statement explains our practices for gathering, using, 
                                    disclosing, and protecting information that are relevant to our service (as defined below), 
                                    as well as your choices for how that information is collected and used. In order to completely 
                                    understand how and why we are using your data, it is crucial that you read our Privacy Policy 
                                    as well as any other privacy notices or fair processing notices we may offer on specific occasions 
                                    when we are collecting or processing personal data about you. The purpose of this privacy notice 
                                    is to supplement the existing notices; it is not meant to replace them.
                                </li>
                                <li class="text-xl">
                                    UniRead is a social platform where users may post online writing, short stories, 
                                    novels and etc. Users create profiles where they can add details about themselves, 
                                    including personal information or any description about there self . Additionally, 
                                    they upload their work and provide feedback to other authors. You have read this 
                                    privacy policy and agree to its terms by using our platform. Additionally, you recognize 
                                    that the Service is a public platform.
                                </li>
                            </ul>
                            <h2 class="text-2xl text-gray-900 mb-2 font-semibold ">Privacy and Data Collection</h2>
                            <ul class="space-y-6 list-inside list-disc my-5 text-gray-500 w-full ">
                                <li class='text-xl'>
                                    The data we gather is influenced by how you use our services and the decisions you take. 
                                    We may gather information about you when you engage with our Services, including 
                                    information that may be used to identify you ("Personal Data") and information that 
                                    cannot be used to identify you ("Non-Personal Data").
                                </li>
                                <li class="text-xl">
                                    We respect your privacy and are committed to protecting your personal information. 
                                    Please refer to our Privacy Policy for details on how we collect, use, and protect 
                                    your data. 
                                </li>
                                <li class="text-xl">
                                    We use standard security methods in the industry to keep customer data safe 
                                    from people who shouldn't be able to see, share, change, or delete it. Encryption, 
                                    access limits, and frequent security checks are all part of this.
                                </li>
                                <li class="text-xl">
                                    We may use cookies and other tracking technologies to collect information
                                </li>
                                <li class="text-xl">
                                    About your use of our website. This information allows us to enhance the user 
                                    experience and may include information on visited pages, book queries, and 
                                    device information.
                                </li>
                            </ul>
                            <h2 class="text-2xl my-5 text-gray-900 mb-2 font-semibold " id="user-content">Intellectual Property</h2>
                            <ul class=" text-gray-500 list-disc list-inside w-full dark:text-gray-400 space-y-3">
                                <li class='text-xl'>
                                    All content provided by the Website, including text, and images is protected by 
                                    copyright and other intellectual property laws. You may not reproduce, distribute, 
                                    or create derivative works without permission.
                                </li>
                                <li class="text-xl">
                                    We collect data related to the books and content you access on our website to 
                                    provide personalized recommendations and enhance your user experience. This may 
                                    include information about the titles, authors, and genres you interact with.
                                </li>
                                <li class="text-xl">                
                                    We implement robust security measures to protect your personal information 
                                    and the intellectual property rights of content creators on our platform. 
                                    This includes encryption, access controls, and regular security audits.
                                </li>
                            </ul>
                            <h2 class="text-2xl my-5 text-gray-900 mb-2 font-semibold " id="user-content">Termination</h2>
                            <ul class=" text-gray-500 list-disc list-inside w-full dark:text-gray-400 space-y-3">
                                <li class='text-xl'>
                                    We reserve the right to terminate or suspend your account at our discretion, 
                                    with or without notice, if you violate these terms. 
                                </li>
                                <li class="text-xl">
                                    We may keep your data (including any material you have contributed and 
                                    any personal information) for as long as is required to comply with any 
                                    legal requirements or resolve any issues that may arise from the termination.
                                </li>
                                <li class="text-xl">                
                                    Upon termination, any licenses granted to you, including 
                                    those related to user-generated material, will also expire. 
                                    After an account is closed, user-generated material may still be 
                                    viewable as per our rules.
                                </li>
                            </ul>
                            <h2 class="text-2xl my-5 text-gray-900 mb-2 font-semibold " id="user-content">Update and Changes</h2>
                            <ul class=" text-gray-500 list-disc list-inside w-full dark:text-gray-400 space-y-3">
                                <li class='text-xl'>
                                    This privacy statement may occasionally be updated to reflect modifications 
                                    to our information practices ("Updated Policy"). Without your express permission, 
                                    we will not limit your rights under any Policy amendments, and we always state the 
                                    date on which the most recent revisions were published.
                                </li>
                                <li class='text-xl'>
                                    We may update the Terms of Service and Privacy Policy from time to time. 
                                    It is your responsibility to review these terms periodically. 
                                </li>
                            </ul>
                            <h2 class="text-2xl my-5 text-gray-900 mb-2 font-semibold " id="user-content">Disclaimers</h2>
                            <ul class=" text-gray-500 list-disc list-inside w-full dark:text-gray-400 space-y-3">
                                <li class='text-xl'>
                                    The Website is provided "as is" and we make no warranties regarding 
                                    its availability, accuracy, or suitability for your needs. 
                                </li>
                                <li class="text-xl">
                                    We do not intentionally collect information from anyone under the age of 18 
                                    since our site is not intended for them. It is the responsibility of parents and 
                                    guardians to monitor their children's use of the Internet.
                                </li>
                                <li class="text-xl">                
                                    Although we make every effort to keep our website up and running smoothly, 
                                    we cannot promise that it will never have disruptions, mistakes, or periods 
                                    of outage. We are not responsible for any difficulties or damages this may cause. 
                                </li>
                                <li class="text-xl">
                                    We are not responsible for any losses or damages resulting from your use of the Website.
                                </li>
                            </ul>
                            <h2 class="text-2xl my-5 text-gray-900 mb-2 font-semibold " id="user-content">Contact Information</h2>
                            <ul class=" text-gray-500 list-disc list-inside w-full dark:text-gray-400 space-y-3">
                                <li class='text-xl'>
                                    In case you have any inquiries, questions, or concerns, don't hesitate 
                                    to get in touch with us. We value your opinion greatly, and with your help, 
                                    UniRead can become a thriving and healthy community.
                                </li>
                                <li class='text-xl'>
                                    By using this Website, you acknowledge that you have read, understood, and agreed to these.
                                </li>
                            </ul>
                        </article>
                    </div>
                    <div class="hidden tab-content my-5 px-20 min-h-[40vh] w-screen flex-col flex items-center" id="content-guidelines">
                        <article class="bg-gray-200 text-justify shadow-lg font-sans shadow-gray-200 text-gray-600 p-10 w-full rounded-lg mr-5">
                            <ul class=" text-gray-500  w-full dark:text-gray-400 space-y-3">
                                <li class='text-2xl'>
                                    At UniRead, we are committed to providing a safe, enjoyable, and diverse reading experience 
                                    for all our users. To maintain a positive environment, we have established the following 
                                    content guidelines
                                </li>
                            </ul>
                        </article>
                    </div>
            </main>
    </body>
</html>
