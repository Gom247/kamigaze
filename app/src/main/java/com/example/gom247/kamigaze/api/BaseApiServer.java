package com.example.gom247.kamigaze.api;

import com.example.gom247.kamigaze.adapter.ResponModel;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

/**
 * Created by Gom247 on 23/04/2019.
 */

public interface BaseApiServer {

    @FormUrlEncoded
    @POST("login_user.php")
    Call<ResponModel> Login(@Field("email") String email,
                            @Field("password") String password);

    @FormUrlEncoded
    @POST("insert_user.php")
    Call<ResponModel> InsertUser(@Field("email") String email,
                                 @Field("password") String password,
                                 @Field("nama") String nama,
                                 @Field("alamat") String alamat,
                                 @Field("notlp") String notlp);

}
