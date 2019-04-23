package com.example.gom247.kamigaze.api;

/**
 * Created by Gom247 on 23/04/2019.
 */

public class UtilsApi {

    public static final String Base_Url = "http://192.168.1.107/kamigaze/";

    public static BaseApiServer getApiServer(){
        return  RetrofitServer.getClient(Base_Url).create(BaseApiServer.class);
    }
}
