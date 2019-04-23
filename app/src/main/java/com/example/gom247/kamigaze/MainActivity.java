package com.example.gom247.kamigaze;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.gom247.kamigaze.adapter.ResponModel;
import com.example.gom247.kamigaze.api.BaseApiServer;
import com.example.gom247.kamigaze.api.UtilsApi;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    @BindView(R.id.edEmail)
    EditText edEmail;
    @BindView(R.id.edPassword)
    EditText edPassword;
    @BindView(R.id.btSign)
    Button btSign;
    @BindView(R.id.btSignUp)
    Button btSignUp;

    BaseApiServer apiServer;
    Context context;
    ProgressDialog progress;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        ButterKnife.bind(this);
        context = this;

        apiServer = UtilsApi.getApiServer();

        btSign.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ProsesLogin();
            }
        });

        btSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ProsesSignUp();
            }
        });
    }

    private void ProsesSignUp() {

        startActivity(new Intent(context, SignUpActivity.class));
    }

    private void ProsesLogin() {

        String email = edEmail.getText().toString();
        String password = edPassword.getText().toString();

        progress = ProgressDialog.show(context,null, "Loading....", false, true);

        apiServer.Login(email, password).enqueue(new Callback<ResponModel>() {
            @Override
            public void onResponse(Call<ResponModel> call, Response<ResponModel> response) {

                String error = response.body().getError();
                String message = response.body().getMessage();

                if (error.equals("false")) {

                    startActivity(new Intent(context, DashboardActivity.class));
                    Toast.makeText(context, message, Toast.LENGTH_SHORT).show();
                    progress.dismiss();

                } else if (error.equals("true")) {

                    Toast.makeText(context, message, Toast.LENGTH_SHORT).show();
                    edPassword.setText("");
                }
            }

            @Override
            public void onFailure(Call<ResponModel> call, Throwable t) {

            }
        });
    }
}
