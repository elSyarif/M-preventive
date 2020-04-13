package monitoring.com.mpreventive;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Bundle;
import android.os.AsyncTask;
import android.os.Environment;
import android.provider.MediaStore;
import android.support.v4.content.FileProvider;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONObject;

import java.io.File;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;

public class Inspeksi_Fragment extends AppCompatActivity implements View.OnClickListener {
    ActionBar actionBar;
    TextView text, txt_tgl;
    String KEY_TAG = "TAG_IN";
    String Tag_Mesin, id, name;
    public String url = Server.URL_TambahIns;
    SharedPreferences sharedpreferences;
    private static final String TAG = Inspeksi_Fragment.class.getSimpleName();
    public static final String TAG_ID = "id";
    public static final String TAG_NAME = "name";
    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";
    int success;
    EditText txt_id_mesin, txt_id_user, txt_tanggal, txt_ovH, txt_ovV, txt_bvH, txt_bvV, txt_temp_drive, txt_non_ovH, txt_non_ovV, txt_non_bvH, txt_non_bvV, txt_Temp_non_drive, txt_oil;
    Button btn_Simpan;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.inspeksi_proses);

        actionBar = getSupportActionBar();
        getSupportActionBar().setTitle("Tambah Inspeksi");
        String title = actionBar.getTitle().toString();

        Button capture_Btn = findViewById(R.id.btn_take_img);

        text = (TextView) findViewById(R.id.text);
        txt_tgl = (TextView) findViewById(R.id.Tgl);

        txt_id_mesin = (EditText) findViewById(R.id.ins_id_Mesin);
        txt_id_user = (EditText) findViewById(R.id.ins_id_user);
        txt_tanggal = (EditText) findViewById(R.id.ins_tgl);
        txt_ovH = (EditText) findViewById(R.id.ins_ovH);
        txt_ovV = (EditText) findViewById(R.id.ins_ovV);
        txt_bvH = (EditText) findViewById(R.id.ins_bvH);
        txt_bvV = (EditText) findViewById(R.id.ins_bvV);
        txt_temp_drive = (EditText) findViewById(R.id.ins_Temp_Drive);
        txt_non_ovH = (EditText) findViewById(R.id.ins_non_ovH);
        txt_non_ovV = (EditText) findViewById(R.id.ins_non_ovV);
        txt_non_bvH = (EditText) findViewById(R.id.ins_non_bvH);
        txt_non_bvV = (EditText) findViewById(R.id.ins_non_bvV);
        txt_Temp_non_drive = (EditText) findViewById(R.id.ins_Temp_non_Drive);
//        txt_oil = (EditText) findViewById(R.id.image_txt);

        btn_Simpan = (Button) findViewById(R.id.ins_simpan);
        btn_Simpan.setOnClickListener(this);

        sharedpreferences = getSharedPreferences(LoginActivity.my_shared_preferences, Context.MODE_PRIVATE);
        id = getIntent().getStringExtra(TAG_ID);
        name = getIntent().getStringExtra(TAG_NAME);

        Bundle bundle = getIntent().getExtras();
        Tag_Mesin = bundle.getString(KEY_TAG);

        txt_id_mesin.setText(Tag_Mesin);
        txt_id_user.setText(id);

    }

    private void kosong() {

    }

    private void TambahInspeksi() {
        final String id_mesin = txt_id_mesin.getText().toString().trim();
        final String id_user = txt_id_user.getText().toString().trim();
        final String tanggal = txt_tanggal.getText().toString().trim();
        final String ovH = txt_ovH.getText().toString().trim();
        final String ovV = txt_ovV.getText().toString().trim();
        final String bvH = txt_bvH.getText().toString().trim();
        final String bvV = txt_bvV.getText().toString().trim();
        final String Temp_Drive = txt_temp_drive.getText().toString().trim();
        final String non_ovH = txt_non_ovH.getText().toString().trim();
        final String non_ovV = txt_non_ovV.getText().toString().trim();
        final String non_bvH = txt_non_bvH.getText().toString().trim();
        final String non_bvV = txt_non_bvV.getText().toString().trim();
        final String Temp_non_Drive = txt_Temp_non_drive.getText().toString().trim();
//        final String oil_sail = txt_oil.getText().toString().trim();


        class Tambah extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Inspeksi_Fragment.this, "Menambahkan...", "Tunggu...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(Inspeksi_Fragment.this, s, Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... v) {
                HashMap<String, String> params = new HashMap<>();
                params.put(Server.KEY_EMP_ID_MESIN, id_mesin);
                params.put(Server.KEY_EMP_ID_USER, id_user);
                params.put(Server.KEY_EMP_TGL_INS, tanggal);
                params.put(Server.KEY_EMP_OV_H, ovH);
                params.put(Server.KEY_EMP_OV_V, ovV);
                params.put(Server.KEY_EMP_BV_H, bvH);
                params.put(Server.KEY_EMP_BV_V, bvV);
                params.put(Server.KEY_EMP_TEMP_DRIVE, Temp_Drive);
                params.put(Server.KEY_EMP_NON_OV_H, non_ovH);
                params.put(Server.KEY_EMP_NON_OV_V, non_ovV);
                params.put(Server.KEY_EMP_NON_BV_H, non_bvH);
                params.put(Server.KEY_EMP_NON_BV_V, non_bvV);
                params.put(Server.KEY_EMP_TEMP_NON_DRIVE, Temp_non_Drive);
//                params.put(Server.KEY_EMP_OIL, oil_sail);

                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostRequest(Server.URL_TambahIns, params);
                return res;
            }
        }
        Tambah ae = new Tambah();
        ae.execute();
    }

    @Override
    public void onClick(View v) {
        if (v == btn_Simpan) {
            TambahInspeksi();
        }
    }

}
