#ifndef PROFILE_H
#define PROFILE_H

#include <QWidget>
#include "rents.h"
#include <QTimeEdit>
#include <QCalendarWidget>
#include <QDate>
#include <QDateEdit>
#include <QMessageBox>
#include <QtMultimedia/QSound>
#include <QMediaPlayer>

namespace Ui {
class Profile;
}

class Profile : public QWidget
{
    Q_OBJECT

public:
    explicit Profile(QWidget *parent = 0);
    explicit Profile(const QString &tempUser, const QString &tempPass, QSqlDatabase &db);
    ~Profile();

private slots:
    void on_pushButtonLogout_clicked();


private:
    Ui::Profile *ui;
    QString Username;
    QString Password;
    QSqlQuery *query;
    QMediaPlayer *player;
    int eID;
    QString DateEntered;
};

#endif // PROFILE_H
