package com.example.subhamsahoo.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

public class Patient_Info extends AppCompatActivity {

    String doctor_name=null;
    String prescription=null;
    TextView doctor_view,prescription_view;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient__info);

        doctor_view=(TextView) findViewById(R.id.activity_patient_info_doctor);
        prescription_view=(TextView) findViewById(R.id.activity_patient_info_prescription);

        Intent intent=getIntent();
        String result=intent.getStringExtra("result");

        //parsing json data here
        try {
            JSONObject jsonObject = new JSONObject(result);
            doctor_name=jsonObject.getString("doctor");
            prescription=jsonObject.getString("prescription");

            doctor_view.setText(doctor_name);
            if(prescription.equals(""))
                prescription_view.setText("No prescription found");
            else
                prescription_view.setText(prescription);

        }
        catch (JSONException e)
        {
            Toast.makeText(this,"incorrect format of data",Toast.LENGTH_LONG).show();
        }



    }



}
