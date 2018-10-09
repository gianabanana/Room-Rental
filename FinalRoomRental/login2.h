#ifndef LOGIN2_H
#define LOGIN2_H

#include <QWidget>
#include "rents.h"

namespace Ui {
class Login2;
}

class Login2 : public QWidget
{
    Q_OBJECT

public:
    explicit Login2(QWidget *parent = 0);
    ~Login2();
    void loadDatabase();
    void delay(int seconds);

private slots:
    void on_pushButtonLogin_clicked();

    void on_pushButtonClickHere_clicked();


private:
    Ui::Login2 *ui;
    int eID;
    QString Username;
    QString Password;
    QString storedUsername;
    QString storedPassword;
    QSqlDatabase db;
};

#endif // LOGIN3_H
