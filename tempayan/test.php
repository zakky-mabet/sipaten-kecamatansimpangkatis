<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyDoI-E830UnZhFQHQzuut4kx8niDz6K0FY' );
$registrationIds = array( $_GET['id'] );
// prep the bundle
$msg = array
(
	'message' 	=> 'here is a message. message',
	'title'		=> 'This is a title. title',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;
?>

<script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCm46I8WR2PGIbl-m3QvgOrEpZ_2Dch8dg",
    authDomain: "tempayan-verifikator.firebaseapp.com",
    databaseURL: "https://tempayan-verifikator.firebaseio.com",
    projectId: "tempayan-verifikator",
    storageBucket: "tempayan-verifikator.appspot.com",
    messagingSenderId: "526893705541"
  };
  firebase.initializeApp(config);
</script>



<!-- 
package id.go.bangkatengahkab.simpangkatis.tempayan.models;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.HashMap;

import id.go.bangkatengahkab.simpangkatis.tempayan.Config.Server;
import id.go.bangkatengahkab.simpangkatis.tempayan.R;
import id.go.bangkatengahkab.simpangkatis.tempayan.Suratkeluar;
import id.go.bangkatengahkab.simpangkatis.tempayan.controllers.DetailSurat;

/**
 * Created by nitinegoro on 10/30/2017.
 */

public class SuratKeluarAdapter extends RecyclerView.Adapter<SuratKeluarAdapter.ViewHolder>
{
    Context context;

    ArrayList<HashMap<String, String>> list_data;

    public SuratKeluarAdapter(Suratkeluar lecturerActivity, ArrayList<HashMap<String, String>> list_data) {
        this.context = lecturerActivity;
        this.list_data = list_data;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.row_surat_keluar, parent, false);
        return new SuratKeluarAdapter.ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final ViewHolder holder, final int position) {
        holder.JdSurat.setText(list_data.get(position).get("judul_surat"));
        holder.NoSurat.setText(list_data.get(position).get("nomor_surat"));
        holder.dateOpt.setText(list_data.get(position).get("tanggal") + " diajukan oleh " + list_data.get(position).get("operator"));
        holder.Pmh.setText(list_data.get(position).get("nama_lengkap") + " (" + list_data.get(position).get("nik") + ")");
        if(list_data.get(position).get("status").equals("approve"))
        {
            Picasso.with(context)
                    .load(Server.approve_status_icon)
                    .error( R.drawable.ic_error_outline )
                    .placeholder( R.drawable.load_animation ).resize(50, 50).into(holder.statusIcon);
        } else {
            Picasso.with(context)
                    .load(Server.unapprove_status_icon)
                    .error( R.drawable.ic_error_outline )
                    .placeholder( R.drawable.load_animation ).resize(50, 50).into(holder.statusIcon);
        }

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                int position = holder.getAdapterPosition();
                Intent detail_surat = new Intent(v.getContext(), DetailSurat.class);
                /* JUDUL HALAMAN */
                detail_surat.putExtra( "IDSurat", list_data.get(position).get("ID") );
                detail_surat.putExtra( "JDSurat", list_data.get(position).get("judul_surat") );
                v.getContext().startActivity(detail_surat);
            }
        });
    }

    @Override
    public int getItemCount() {
        return list_data.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView JdSurat;
        TextView NoSurat;
        TextView dateOpt;
        TextView Pmh;
        ImageView statusIcon;

        public ViewHolder(View itemView) {
            super(itemView);

            JdSurat = (TextView) itemView.findViewById(R.id.JdSurat);
            NoSurat = (TextView) itemView.findViewById(R.id.NoSurat);
            dateOpt = (TextView) itemView.findViewById(R.id.dateOpt);
            Pmh = (TextView) itemView.findViewById(R.id.Pmh);
            statusIcon = (ImageView) itemView.findViewById(R.id.statusIcon);
        }
    }
}

 -->
