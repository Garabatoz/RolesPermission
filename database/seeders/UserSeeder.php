<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');

        $users = [
            [
                'name' => 'Mr. Super Admin',
                'email' => 'sadmin@sadmin.com',
                'role_type' => 'administrator',
                'password' => $password,
                'created_at' => Carbon::now(),
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTg4OTY0NGU0NzUwZmY1ZWJlYmQ5OWI1ZjZjN2YxZDEyOWYzMTcxMTJhMmFjNTkxOWMxODRjYzczY2ZjNTEyYzg5YTZmZjkwNmJmOTgzZWMiLCJpYXQiOjE2ODc2NDQyMTYuODM5Njc0LCJuYmYiOjE2ODc2NDQyMTYuODM5Njc4LCJleHAiOjE3MTkyNjY2MTYuODI1NzQ3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UQO3n2Uz8zSOLA0LQvRsBHIToahqgU33HN7mfmbppLb2K2km29fKJqh8YAPS4Kdx9MfawUjggEsk7E0Ug4lq_dQaXRdk-S7Nf5Bkb9Ue9Bdl4b6_tV1odgf7oXggElD06BkcQGNJLBXWkfKLhFnSmi4KZdbhbuTlTT7zcQL6j8Vr6MBUHA5pe5AElZQFbnG1XSpIx3kEqbEmoL6VZeH3-AKu1F8nXnNnsioy0qjyGqMY9zujOuhVaCioZcQk5P9Xo6-wysj5pdtmdqU1PnTqidGRZDUt1R4ZWj_2yoP6FAwa2lTxhYrJhDu6W07DVPzn9VrCq_cam8j4n-WdkCPX1vWMRqbnxoU-iV7aYyr2VaACjvTWg64ef0g2cnjiaUs0OuEl9uWaGCL6SNBx43AqBTV-Z3JTODQ76mZWS8yyArbekIqn3YCj_ovUA1N-BvRiNRc-wKaD8gRF_1ER1_fSsEJuRIQpFDEvS-lLO3321xanuo2rFLfhfRNeIdYSXzGZADTOn4rnQvP_JRn4UJGy1GhG2txqVZHbJnAI1G4XkOc3LkuhC21Voty5kiYGkZN9EMkpZzwiMtMFnUAwFBL8tVl6joQcrjQoz79LJQRHwE_Qhr8br68CNAgPyBTAry3dbzjemWgpeFNRAqjgs9cJDKhBvheUVKyCWcIF4Zx1SS8',
            ],
            [
                'name' => 'Mr. Admin',
                'email' => 'admin@admin.com',
                'role_type' => 'administrator',
                'password' => $password,
                'created_at' => Carbon::now(),
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZmI3NzA2NGY3MDRhZTI0MzJmNTE4ZjlmYzc2NTA5ZDMwZjg4OGE4MGIxNWUwNThhZTkxZjg2OTJjNzE3NTJkYWJlYjc2OGVjNDg1YjVhMzMiLCJpYXQiOjE2ODc3MjM5NzEuNzQ0MDk3LCJuYmYiOjE2ODc3MjM5NzEuNzQ0MTAxLCJleHAiOjE3MTkzNDYzNzEuNzMzNTMxLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.NBGW-pzsjK4rMYnUeqiXkV2UkQaOfj2bLDaUW5Mb_XTP9Oq1YVsAw4lby1_3Ua-hGwUY476H7a3v6wSVmJLlFPFLDGNW0pG8lgt6UMloBtofOVKRSsRnJUSVoDKKlNlaBLzie4w6_aXorh5v_jDUiF4VGsLHA0r793LjQi9F1E5GCYkXS4QAfYyjgMp7T--JxNy8EbMnkCMhY2oZiU5h4fmEg8m_23SGSBapaa5RQKL-jrYi4YBOF5QOiS7UTjNF9ntdEgCpFH_-U8rPeaAYvF4HgWCN0D1kuhOAInvtY39LwXaBHIy7gwIMWLlYc-C_5uLnj9qkzwhFD5vBMU2ybxGd3NYX6hao4aQKwu3yVfp0GkC4zNpIc8iiSFsEMhC0zJB1APefglC_AoeYaSE3EEXxTulolPUYFg3OVYqqKBBmf_9VwMtyg8YQzKVBUorbDCPMKOF70rvnmDyRWQOeAqGThYmVuhwtwSa3k2XySkuwTKa59-wE4XjwBShYoAEyCcuDlx2Kwd6i8-7nZmpr7lYcinz3iul8MPtCZBSIxrKkzTVlRynbJcCPpa9Bv59woP8_Xpo1fi7vpTki1n7JTw3VQdcV_2pSG0PER6BuBuf8O0edm24k3bRijElfadZcwtZW8l99BD38gn16sAv4jEtk1yo7NGLW0qO9NVi9zd4'
            ],
            [
                'name' => 'Mr. Author',
                'email' => 'author@author.com',
                'role_type' => 'administrator',
                'password' => $password,
                'created_at' => Carbon::now(),
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNTExNTlkYTBlYjIwYzViODZlNzkxZDk1NzllY2E2ODJmYjRlZjVhZDVkNWMxOWQ1YjU3M2IzMjc4ZWFlYzA4YjFiZTY3YWQzODU4YTQyYTYiLCJpYXQiOjE2ODc3MjM5OTQuNzkyMzQ4LCJuYmYiOjE2ODc3MjM5OTQuNzkyMzUyLCJleHAiOjE3MTkzNDYzOTQuNzg0MDI5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.EkmKvnt4LZ9kMYdG6pFwlu9Z87i_7NlKU8J5wOUGsgKuaADXveV7LGAnRkkzOh33o5KYMCf-qEgkGu7gX_D0TrDoZOw_tUOerMN2iqHAT_DEXw_9OtT1AdMrVjeqNPVKn15qgWZVPvWGx5ZEGVI_UXQf7W2SX28kRs1WxSxjcbSWdEpsaBQPxli8EITyvz8iyv2qbnMCUNnHSwt3CptRNCBwLQ8UkzRxSwW8gMSP-9rdfdUgeKd2IbjK8dHwj87oAPHFot67wfyzIHSWOOtCgeiqCmdjL0Z1_Hpt7hYXh6vEyEqab5i95XHZ3An6GMrDFcXaAZ-1Wf0ax-2ZFyL4ZWAH-A_JwFS0usI8iLidjOrhTnpYdmyYr0PoG7R2zTKsH11keAaOPxozPl4MuItd1GSseleO5wu1T9N5Du89_s0ez2lYBZ3EvKJHvL4i9zHFdvMtFrOnBQgWKyy564EE5tyWUDytQYTapJn456snULiRhaxDQ2AGpfRQMcIQYn0VtQmBMQlYshEV6WWo8SkKHBo5zGEazoOB-1Nb7beYClstouFuYyu3-h52N9V4tvNWYxEb_ooUk6PaDIkh1DVi-pTDNrw8yhGuNBKgfK-bp8cv4SNmD8qzaOowt45MjR183PIMx06kLEIJ3-b1KzM6eQWa12ozJe_vslZjefTPtGs'
            ],
            [
                'name' => 'Mr. Editor',
                'email' => 'editor@editor.com',
                'role_type' => 'administrator',
                'password' => $password,
                'created_at' => Carbon::now(),
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGM3ZDZmYjc1NTI1NzM3ZjRmN2JlMzI4NGZlNmZiZjQwYjk4YTYwYzhmMWYyODE4ZGRhYTczZjQ1NmExY2U3M2RlYzk5OWM0YWZiYTFlY2IiLCJpYXQiOjE2ODc3MjQwMTMuODUxMjMzLCJuYmYiOjE2ODc3MjQwMTMuODUxMjM4LCJleHAiOjE3MTkzNDY0MTMuODQxMDQ4LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.fuoSKwkkNK2HR7A8mr_99JmWOA-UYqKKnuCa-T6fPlxnxX4BYRRfNqLcsaQXrU5CwmbeRdbedt2o-ie25x9dY3WrYuyz1WIz2-I_ePnSg9jCEzu9vvmISNDtZa8NpawJe94EASWvupc0ypHperkLofWQNy9Gk0rlqfXf1fm3GwjcpsXi49zv8gfZSPNAhkBJWqaM5pSz00b90zojkidcEFaCgv4pifnYRXCZc59v5qPc8jrv1be5Lzm2riRY-LKpi7fHU-5PE_B6h_1c9xjAwgoPe6hpWyNDfFqEyXexwzG81tGkvOF_bvm9oYDNAUobwoaT60FKjE-mLnINpcH3Jje3haWXytJO7Lz8FXu92VnkaEZwM1b6tU9aBONoi3WkmRRGVZ1pWkVGAJMYImezh-urz0xok3bmVv_Bog9LAuWvR8O_Tn8nM0vs0NpywLbqpy0Sjd020EmUxQX3G9hiYrcZu3DaPzX2S-5FvF22TKY0ubNRtoT81RoMl4lRZ12YfmZSuVLDEnt9ZL8CxcTKpHaWsmvIXhB5xnxoOwoxg3QEwSZmYzBZVqf8LZiXIplPj7vRTLPDpIEPDy9ETrUAjdF01C_LdxQSyRsPohEH4Jm2XF6tinB6O68GO5C6EgKb97reyFQDQ6COUbGvU-Qogj93YSnF1nK2FqExVnMcxv0'
            ],
            [
                'name' => 'Mr. User 1',
                'email' => 'user1@user.com',
                'role_type' => 'user',
                'password' => $password,
                'created_at' => Carbon::now(),
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMzA3ZmVjMDVjNDFjOTdlNzMzZmQzYTI3N2VkYTUwMTExOWE5Mjg5MmY4ZmIzYzJhZWIxOGI0OTBlODU1ZWY2ZjE2MWVlZTEzYWJlMTNkMGIiLCJpYXQiOjE2ODc3MjQwMzYuMzM4OTU0LCJuYmYiOjE2ODc3MjQwMzYuMzM4OTU2LCJleHAiOjE3MTkzNDY0MzYuMzMxNTIzLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.gYty9FPohgzzSkf3sos6792UcrMiaQ1qJCPbZnkBnb0BErXj1XQ3KS_rkIUJWkFvvdZy1Lqk-69uYnSDd8k23-RuAUGZmgmGmtksT4mYtBJCqrUAJ8UcswsllU_kzbWbMBioYuUYjWy7tFnth5EGLOGLU8M9S6sIvokIPDdztKqYQlEFm1E-_CfzxhOTt7VwJQ79MB72KcA_-XaMIdIsuvK_rub5k7UER6FnMeJ2EqQ2KV634lR6V1EWDZ7xralgJse5BBe2iT8jGGEoHYrIYRKMCt4zacyJuRCpQqU6R3nBUGMURS9rb8kQkeiU6-GMIQlHPz7cWyZIhGgLslxqfpIxYmivotZxJbiz6hyHsrtp4GAdLkNN-OaKUet0ilb34BPm00HWUpo0UAVRwWReIOYmxmd3NG-720QgzgTJosqmmV5fME8WSLRdRCFKoFt3lzJpsP51wVyE46sYL5SuxNUnn0D4hw5y5ks9RuO0ForRSgIRQhPmlZnrsvHdG9d7Ohfh5hGbEjrI0Snw31nIpIA3RRAtilzVPV1vfAj0x24GPrCrdfZzlanPplxgk_DVy0PzrmlYNGC9y3Xbupv5M8hIKWWVuv3VD-HFD3GtwndDLFqklS63YZuJO7p2_ZUZP3wyimAjeU4baHbdwrWHoBRPeyAMrVUc9HX94SjUsaQ'
            ]
        ];

        DB::table('users')->insert($users);

        // $user1 = [
        //     'name' => 'Mr. Super Admin',
        //     'email' => 'sadmin@sadmin.com',
        //     'role_type' => 'administrator',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user1);

        // $user2 = [
        //     'name' => 'Mr. Admin',
        //     'email' => 'admin@admin.com',
        //     'role_type' => 'administrator',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user2);

        // $user3 = [
        //     'name' => 'Mr. Author',
        //     'email' => 'author@author.com',
        //     'role_type' => 'administrator',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user3);

        // $user4 = [
        //     'name' => 'Mr. Editor',
        //     'email' => 'editor@editor.com',
        //     'role_type' => 'administrator',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user4);

        // $user5 = [
        //     'name' => 'Mr. User 1',
        //     'email' => 'user1@user.com',
        //     'role_type' => 'user',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user5);

        // $user6 = [
        //     'name' => 'Mr. User 2',
        //     'email' => 'user2@user.com',
        //     'role_type' => 'user',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user6);

        // $user7 = [
        //     'name' => 'Mr. User 3',
        //     'email' => 'user3@user.com',
        //     'role_type' => 'user',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user7);

        // $user8 = [
        //     'name' => 'Mr. User 4',
        //     'email' => 'user4@user.com',
        //     'role_type' => 'user',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user8);


        // $user9 = [
        //     'name' => 'Mr. User',
        //     'email' => 'user@user.com',
        //     'role_type' => 'user',
        //     'password' => $password,
        //     'created_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($user9);
    }
}
