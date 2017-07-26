package app.bosornd.fishfarm;

/**
 * Created by jun on 17. 7. 23.
 */

import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.media.RingtoneManager;
import android.net.Uri;
import android.support.v4.app.NotificationCompat;

import com.google.firebase.messaging.RemoteMessage;

public class MyFirebaseMessagingService extends com.google.firebase.messaging.FirebaseMessagingService {
    private static final String TAG = "FirebaseMsgService";

    // [START receive_message]
    @Override
    public void onMessageReceived(RemoteMessage remoteMessage) {

        //추가한것
        sendNotification(remoteMessage.getData().get("message"));
    }

    private void sendNotification(String messageBody) {
        Intent intent = new Intent(this, MainActivity.class);
        intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        PendingIntent pendingIntent = PendingIntent.getActivity(this, 0 /* Request code */, intent,
                PendingIntent.FLAG_ONE_SHOT);

        Uri defaultSoundUri= RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
        NotificationCompat.Builder notificationBuilder = new NotificationCompat.Builder(this)
                .setSmallIcon(R.mipmap.ic_launcher)     // 알림 영역에 노출 될 아이콘.
                .setContentTitle("FCM Push")        // 알림 영역에 노출 될 타이틀
                .setContentText(messageBody)        // Firebase Console 에서 사용자가 전달한 메시지내용
                .setAutoCancel(true)
                .setSound(defaultSoundUri)
                .setContentIntent(pendingIntent)
                .setSmallIcon(R.mipmap.ic_launcher) ;


        NotificationManager notificationManager =
                (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);

        notificationManager.notify(0 /* ID of notification */, notificationBuilder.build());


        //알림에 사운드 기능 추가
        Uri soundUri= RingtoneManager.getActualDefaultRingtoneUri(this, RingtoneManager.TYPE_NOTIFICATION);
        notificationBuilder.setSound(soundUri);

        //알림에 진동 기능 추가
        notificationBuilder.setVibrate(new long[]{0,3000}); // pattern의 첫번째 파라미터는 wait시간, 두번째는 진동시간(단위 ms)

    }

}