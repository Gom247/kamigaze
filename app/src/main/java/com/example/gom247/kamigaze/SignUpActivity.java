package com.example.gom247.kamigaze;

import android.app.ProgressDialog;
import android.content.Context;
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

public class SignUpActivity extends AppCompatActivity {

    @BindView(R.id.edEmail)
    EditText edEmail;
    @BindView(R.id.edPassword)
    EditText edPassword;
    @BindView(R.id.edNama)
    EditText edNama;
    @BindView(R.id.edAlamat)
    EditText edAlamat;
    @BindView(R.id.edNotlp)
    EditText edNotlp;
    @BindView(R.id.btSignUp)
    Button btSignUp;

    BaseApiServer apiServer;
    Context context;
    ProgressDialog progress;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        ButterKnife.bind(this);
        context = this;
        apiServer = UtilsApi.getApiServer();

        btSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ProsesSignUp();
            }
        });

    }

    private void ProsesSignUp() {

        String email = edEmail.getText().toString();
        String password = edPassword.getText().toString();
        String nama = edNama.getText().toString();
        String alamat = edAlamat.getText().toString();
        String notlp = edNotlp.getText().toString();

        progress = ProgressDialog.show(context, null, "Loading....", false, true);

        apiServer.InsertUser(email, password, nama, alamat, notlp).enqueue(new Callback<ResponModel>() {
            @Override
            public void onResponse(Call<ResponModel> call, Response<ResponModel> response) {

                String error = response.body().getError();
                String message = response.body().getMessage();
                progress.dismiss();

                if (error.equals("false")) {

                    Toast.makeText(context, message, Toast.LENGTH_SHORT).show();
                    finish();

                } else if (error.equals("true")) {

                    Toast.makeText(context, message, Toast.LENGTH_SHORT).show();
                    edEmail.setText("");
                    edPassword.setText("");
                    edNama.setText("");
                    edAlamat.setText("");
                    edNotlp.setText("");
                }
            }

            @Override
            public void onFailure(Call<ResponModel> call, Throwable t) {
                progress.dismiss();
            }
        });
    }
}
