package com.example.subhamsahoo.myapplication;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

/**
 * Created by subham sahoo on 15-01-2019.
 */

public class MyBackGroundClass extends AsyncTask<String,Integer,String> {
    String login_url= "http://10.42.0.1/android/login.php";

    Context context=null;
    public MyBackGroundClass() {
        super();
    }

    public MyBackGroundClass(Context context)
    {
        super();
        this.context=context;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
    }

    @Override
    protected String doInBackground(String... param)
    {
        //Toast.makeText(context,"Login Success",Toast.LENGTH_SHORT).show();

        String username=param[0];
        String password=param[1];
        String ret_str="";
        try {
            ret_str+="1";
            URL url = new URL(login_url);
            ret_str+="2";
            HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
            ret_str+="3";
            httpURLConnection.setRequestMethod("POST");
            ret_str+="4";
            httpURLConnection.setDoOutput(true);
            ret_str+="5";
            httpURLConnection.setDoInput(true);
            ret_str+="6";
            OutputStream outputStream = httpURLConnection.getOutputStream();
            ret_str+="7";
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream,"UTF-8"));
            ret_str+="8";
            String data = URLEncoder.encode("patientid","UTF-8")+"="+URLEncoder.encode(username,"UTF-8")+"&"+
                    URLEncoder.encode("password","UTF-8")+"="+URLEncoder.encode(password,"UTF-8");
            ret_str+="9";
            bufferedWriter.write(data);
            ret_str+="a";
            bufferedWriter.flush();
            ret_str+="b";
            bufferedWriter.close();
            outputStream.close();
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));
            String response = "";
            String line = "";
            
            while ((line = bufferedReader.readLine())!=null)
            {
                response+= line;
            }

            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            return response;
        } catch (MalformedURLException e) {
            e.printStackTrace();
            return ret_str+"  MalformedURLException";

        } catch (IOException e) {
            e.printStackTrace();
            return ret_str+"  IOException";

        }



    }

    @Override
    protected void onProgressUpdate(Integer... values) {
        super.onProgressUpdate(values);
    }

    @Override
    protected void onPostExecute(String result) {

        super.onPostExecute(result);
        //Toast.makeText(context,result,Toast.LENGTH_LONG).show();

        if(result!=null) {
            //Toast.makeText(context,result,Toast.LENGTH_LONG).show();
                /*if (result.equals("success")) {
                    Toast.makeText(context, "Login Success", Toast.LENGTH_LONG).show();
                } else {
                    Toast.makeText(context, "Login Failure", Toast.LENGTH_LONG).show();
                }*/
                if(!(result.equals("check")))
                {
                    Intent intent=new Intent(context,Patient_Info.class);
                    intent.putExtra("result",result);
                    context.startActivity(intent);
                }
                else
                {
                    Toast.makeText(context,"Invalid Login Credinals",Toast.LENGTH_LONG).show();
                }
        }
        else
        {
            Toast.makeText(context,"nulli",Toast.LENGTH_LONG).show();

        }
    }



}
