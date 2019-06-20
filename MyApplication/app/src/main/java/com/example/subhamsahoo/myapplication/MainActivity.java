package com.example.subhamsahoo.myapplication;

import android.graphics.Color;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;

public class MainActivity extends AppCompatActivity {


    EditText username=null;
    EditText password=null;
    Button login=null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        username=(EditText) findViewById(R.id.activity_main_userName);
        password=(EditText)findViewById(R.id.activity_main_password);
        login=(Button)findViewById(R.id.activity_main_login);

        login.setTextColor(Color.BLUE);


    }
    public void login(View view)
    {
        String login_username=username.getText().toString();
        String login_password=password.getText().toString();

        MyBackGroundClass myBackGroundClass=new MyBackGroundClass(this);
        myBackGroundClass.execute(login_username,login_password);



    }




}

