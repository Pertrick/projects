package com.example.loginsignupapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.textfield.TextInputLayout;
import com.google.firebase.auth.FirebaseAuth;

public class Recover_Password extends AppCompatActivity {

    private TextInputLayout passwordEmail;
    private Button reset_Button;
    private FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_recover__password);

        passwordEmail = findViewById(R.id.reset_pass);
        reset_Button = findViewById(R.id.btn_Reset);
        firebaseAuth = FirebaseAuth.getInstance();


        reset_Button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String useremail = passwordEmail.getEditText().getText().toString().trim();

                if(useremail.equals("")){
                    Toast.makeText(Recover_Password.this, "Please, enter your Registered Email", Toast.LENGTH_LONG).show();
                }

                else{
                    firebaseAuth.sendPasswordResetEmail(useremail).addOnCompleteListener(new OnCompleteListener<Void>() {
                        @Override
                        public void onComplete(@NonNull Task<Void> task) {
                            if(task.isSuccessful()){
                                Toast.makeText(Recover_Password.this, "Password recovery mail sent!", Toast.LENGTH_LONG).show();
                                finish();
                                startActivity(new Intent(Recover_Password.this, Login.class));

                            }
                            else {

                                Toast.makeText(Recover_Password.this, "Error sending password recovery mail!", Toast.LENGTH_LONG).show();

                            }
                        }
                    });
                }

            }
        });
    }
}